<?php
class Excellence_Phone_Model_Resource_Contact extends Mage_Customer_Model_Resource_Customer
{
    public function loadByContact($phone)
    { 
        $customer = Mage::getModel('customer/customer');
        $collection = $customer->getCollection()->addAttributeToFilter('phone_no', $phone)->getData();
        $arr = $collection;
        foreach($collection as $con){ 
        	$email = $con['email']; 
        }
        return $email;
    }
}