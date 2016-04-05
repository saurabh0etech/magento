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
}