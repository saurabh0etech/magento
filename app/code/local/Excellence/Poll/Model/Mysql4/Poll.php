<?php

class Excellence_Poll_Model_Mysql4_Poll extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the poll_id refers to the key field in your database table.
        $this->_init('poll/poll', 'poll_id');
    }
}