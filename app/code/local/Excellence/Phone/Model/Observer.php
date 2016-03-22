<?php
class Excellence_Phone_Model_Observer {
    
public function loginStatus(Varien_Event_Observer $observer) {   
Mage::log("hello"); 
        $event = $observer->getEvent();       
        $customer = $event->getCustomer();
        $email = $customer->getEmail();
        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');
        $data = array('user_name' => $email, 'login_time' => $dateTime);         
        $model = Mage::getModel('phone/login')->setData($data);
        //echo $model; die();
        Mage::getSingleton('core/session')->addSuccess('Customer Information saved successfully');        
        $id = $model->save()->getId();
        $myValue = $id;
        //echo $myValue; die();
        Mage::getSingleton('core/session')->setMyValue($myValue);
        Mage::getSingleton('core/session')->addSuccess($id);
    }
public function logoutStatus( Varien_Event_Observer $observer) { 
        //Mage::log("hello world");
        $event = $observer->getEvent();       
        $customer = $event->getCustomer();
        $email = $customer->getEmail();
        $id = $customer->getId();         
        $myValue = '';
        $myValue = Mage::getSingleton('core/session')->getMyValue();           
        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');        
        $arr['logout_time'] = $dateTime;
        //print_r($timeArray); die();
        $model = Mage::getModel('phone/login')->load($myValue);
        $model->addData($arr);
        $model->save();
        Mage::getSingleton('core/session')->addSuccess('Customer Information saved successfully');      
    }
}