<?php

class Excellence_Polling_Model_Mysql4_Polling_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/polling');
    }
}