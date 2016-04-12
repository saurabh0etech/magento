<?php

class Excellence_Polling_Model_Polling extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/polling');
    }
    public function joinData(){        
     
        $model = Mage::getModel('polling/polling')->getCollection()->setOrder('polling_id', 'DESC')->setPageSize(1);
        return $model;

    }
    // public function updateId($id1){        
    //     $model1= Mage::getResourceModel('polling/polling')->updateId($id1);
    //     return $model1;
    // }
    
}