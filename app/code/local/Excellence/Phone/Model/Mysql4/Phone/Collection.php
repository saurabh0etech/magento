<?php

class Excellence_Phone_Model_Mysql4_Phone_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('phone/phone');
    }
}