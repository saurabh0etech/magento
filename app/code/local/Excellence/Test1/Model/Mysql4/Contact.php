<?php

class Excellence_Test1_Model_Mysql4_Contact extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the mydata_id refers to the key field in your database table.
        $this->_init('test1/contact', 'con_id');
    }
}