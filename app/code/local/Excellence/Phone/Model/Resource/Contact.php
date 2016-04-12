<?php
class Excellence_Phone_Model_Resource_Contact extends Mage_Customer_Model_Resource_Customer
{
    public function loadByContact($phone)
    { 
        $customer = Mage::getModel('phone/contact');
        $collection = $customer->getCollection()->addAttributeToFilter('phone_no', $phone)->getData();
        $arr = $collection;
        foreach($collection as $con){ 
        	$email = $con['email']; 
        }
        return $email;
    }
    protected function _beforeSave(Varien_Object $customer)
    {        
        $number = Mage::app()->getRequest()->getPost('phone_no');
        //echo $number; die();
        $customerr = Mage::getModel('phone/contact');
        $collection = $customerr->getCollection()->addAttributeToFilter('phone_no', $number)->getFirstItem();
        if(!empty($collection['email'])){
            throw Mage::exception(
                'Mage_Customer', Mage::helper('customer')->__('Contact number you entered is already exists'),
                Mage_Customer_Model_Customer::EXCEPTION_EMAIL_NOT_CONFIRMED
            );
        }
        return parent::_beforeSave($customer);
    }
}