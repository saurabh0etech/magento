<?php
require_once 'Mage/Customer/controllers/AccountController.php';
class Excellence_Test1_Login_LoginController extends Mage_Customer_AccountController{ 

    public function indexAction()
    {
        
        /*
         * Load an object by id 
         * Request looking like:
         * http://site.com/test?id=15 
         *  or
         * http://site.com/test/id/15   
         */
        /* 
        $test_id = $this->getRequest()->getParam('id');

        if($test_id != null && $test_id != '')  {
            $test = Mage::getModel('test/test')->load($test_id)->getData();
        } else {
            $test = null;
        }   
        */
        
         /*
         * If no param we load a the last created item
         */ 
        /*
        if($test == null) {
            $resource = Mage::getSingleton('core/resource');
            $read= $resource->getConnection('core_read');
            $testTable = $resource->getTableName('test');
            
            $select = $read->select()
               ->from($testTable,array('test_id','title','content','status'))
               ->where('status',1)
               ->order('created_time DESC') ;
               
            $test = $read->fetchRow($select);
        }
        Mage::register('test', $test);
        */            
        $this->loadLayout();     
        $this->renderLayout();
        
    }
    
    public function createPostAction()
    {
        $this->loadLayout(); 
        //echo "hello"; die();
        $errUrl = $this->_getUrl('*/*/create', array('_secure' => true));

        if (!$this->_validateFormKey()) {
            $this->_redirectError($errUrl);
            return;
        }

        /** @var $session Mage_Customer_Model_Session */
        $session = $this->_getSession();
        if ($session->isLoggedIn()) {
            $this->_redirect('*/*/');
            return;
        }

        if (!$this->getRequest()->isPost()) {
            $this->_redirectError($errUrl);
            return;
        }

        $customer = $this->_getCustomer();

        try {
            $errors = $this->_getCustomerErrors($customer);

            // if (empty($errors)) {
            $customer->cleanPasswordsValidationData();
            $customer->save();
            $this->_dispatchRegisterSuccess($customer);
            $this->_successProcessRegistration($customer);
            return;
            // } else {
            //     $this->_addSessionError($errors);
            // }
        } catch (Mage_Core_Exception $e) {
            $session->setCustomerFormData($this->getRequest()->getPost());
            if ($e->getCode() === Mage_Customer_Model_Customer::EXCEPTION_EMAIL_EXISTS) {
                $url = $this->_getUrl('customer/account/forgotpassword');
                $message = $this->__('There is already an account with this email address. If you are sure that it is your email address, <a href="%s">click here</a> to get your password and access your account.', $url);
            } else {
                $message = $this->_escapeHtml($e->getMessage());
            }
            $session->addError($message);
        } catch (Exception $e) {
            $session->setCustomerFormData($this->getRequest()->getPost());
            $session->addException($e, $this->__('Cannot save the customer.'));
        }

        $this->_redirectError($errUrl);
        $this->renderLayout();
    }
    
}
