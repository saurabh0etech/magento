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
    public function showJoin(){
   
    $data2 = Mage::getModel('polling/polling')->joinData();  
    return $data2;
}
public function showPro(){

    $data1 = Mage::getModel('polling/answer')->fetchAnswer();    
    return $data1;
}
public function saveId(){
    
}
    
}