<?php

class Excellence_Polling_Model_New extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/new_id');
    }
    
}