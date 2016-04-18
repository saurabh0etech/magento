<?php

class Excellence_Polling_Model_Mysql4_New extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the polling_id refers to the key field in your database table.
        $this->_init('polling/new_id','id');
    }
    
    
}