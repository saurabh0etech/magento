<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'polling';
        $this->_controller = 'adminhtml_polling';
        
        $this->_updateButton('save', 'label', Mage::helper('polling')->__('Save Poll'));
        $this->_updateButton('delete', 'label', Mage::helper('polling')->__('Delete Item'));
		 
       }

    public function getHeaderText()
    {
        if( Mage::registry('polling_data') && Mage::registry('polling_data')->getId() ) {
            return Mage::helper('polling')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('polling_data')->getTitle()));
        } else {
            return Mage::helper('polling')->__('Add Poll');
        }
    }
}