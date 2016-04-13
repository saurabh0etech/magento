<?php

class Excellence_Polling_Model_Answer extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('polling/answer');
    }
    public function updateData($id1){        
        $model1= Mage::getResourceModel('polling/answer')->updateData($id1);
        return $model1;
    }
    public function showAnswer()
    {
        return $this->getCollection();
    }
    public function fetchAnswer()
    {     
      $model = Mage::getModel('polling/answer')->getCollection()->setOrder('polling_id', 'DESC')->setPageSize(4);
        return $model;
  }
  public function getVotes($id1){
    //echo $id1; die();
    $model1= Mage::getResourceModel('polling/answer')->getVotes($id1);
      return $model1;
    
}
}