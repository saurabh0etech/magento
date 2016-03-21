<?php

class Excellence_Phone_Model_Phone extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('phone/phone');
    }
}