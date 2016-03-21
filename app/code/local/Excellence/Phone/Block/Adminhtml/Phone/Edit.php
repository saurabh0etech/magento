<?php

class Excellence_Phone_Block_Adminhtml_Phone_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'phone';
        $this->_controller = 'adminhtml_phone';
        
        $this->_updateButton('save', 'label', Mage::helper('phone')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('phone')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('phone_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'phone_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'phone_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('phone_data') && Mage::registry('phone_data')->getId() ) {
            return Mage::helper('phone')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('phone_data')->getTitle()));
        } else {
            return Mage::helper('phone')->__('Add Item');
        }
    }
}