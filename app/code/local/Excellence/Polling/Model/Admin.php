<?php

class Excellence_Polling_Model_Admin extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/admin');
    }
        
}