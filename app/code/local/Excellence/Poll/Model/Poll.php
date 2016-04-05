<?php

class Excellence_Poll_Model_Poll extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('poll/poll');
    }
}