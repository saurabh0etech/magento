<?php

class Excellence_Polling_Model_Userid extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/userid');
    }
    public function searchId($id1){        
        $model1= Mage::getResourceModel('polling/userid')->searchId($id1);
        return $model1;
    }
}