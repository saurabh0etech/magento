<?php
class Excellence_Polling_Block_Polling extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
      return parent::_prepareLayout();
  }
  public function getPolling()     
  { 
    if (!$this->hasData('polling')) {
        $this->setData('polling', Mage::registry('polling'));
    }
    return $this->getData('polling');
}
public function fetchQuestions(){

    $data2 = Mage::getModel('polling/polling')->questionData();  
    return $data2;
}
public function fetchAnswers(){

    $data1 = Mage::getModel('polling/answer')->answerData();    
    return $data1;
}
}