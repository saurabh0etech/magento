<?php
class Excellence_Phone_Block_Phone extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPhone()     
     { 
        if (!$this->hasData('phone')) {
            $this->setData('phone', Mage::registry('phone'));
        }
        return $this->getData('phone');
        
    }
}