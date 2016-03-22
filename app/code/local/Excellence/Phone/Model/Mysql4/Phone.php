<?php

class Excellence_Phone_Model_Mysql4_Phone extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the phone_id refers to the key field in your database table.
        $this->_init('phone/phone', 'phone_id');
    }
}