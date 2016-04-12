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
        $value = $id;
        //echo $myValue; die();
        Mage::getSingleton('core/session')->setMyId($value);        
    }
    public function logoutStatus( Varien_Event_Observer $observer) { 
        //Mage::log("hello world");
        $event = $observer->getEvent();       
        $customer = $event->getCustomer();
        $email = $customer->getEmail();
        $id = $customer->getId();         
        $value = '';
        $value = Mage::getSingleton('core/session')->getMyId();           
        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');        
        $arr['logout_time'] = $dateTime;
        //print_r($timeArray); die();
        $model = Mage::getModel('phone/login')->load($value);
        $model->addData($arr);
        $model->save();
        Mage::getSingleton('core/session')->addSuccess('Customer Information saved successfully');      
    }
}