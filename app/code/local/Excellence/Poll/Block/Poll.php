<?php
class Excellence_Poll_Block_Poll extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPoll()     
     { 
        if (!$this->hasData('poll')) {
            $this->setData('poll', Mage::registry('poll'));
        }
        return $this->getData('poll');
        
    }
}