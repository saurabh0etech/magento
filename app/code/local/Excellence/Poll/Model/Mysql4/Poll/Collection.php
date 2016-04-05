<?php

class Excellence_Poll_Model_Mysql4_Poll_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('poll/poll');
    }
}