<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'polling';
        $this->_controller = 'adminhtml_polling';
        
        $this->_updateButton('save', 'label', Mage::helper('polling')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('polling')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('polling_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'polling_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'polling_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('polling_data') && Mage::registry('polling_data')->getId() ) {
            return Mage::helper('polling')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('polling_data')->getTitle()));
        } else {
            return Mage::helper('polling')->__('Add Item');
        }
    }
}