<?php

class Excellence_Phone_Model_Login extends Mage_Core_Model_Abstract
{
	public function _construct()
    {            
        $this->_init('phone/login', 'id');
    }
}