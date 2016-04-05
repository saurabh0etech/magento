<?php

class Excellence_Poll_Block_Adminhtml_Poll_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'poll';
        $this->_controller = 'adminhtml_poll';
        
        $this->_updateButton('save', 'label', Mage::helper('poll')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('poll')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('poll_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'poll_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'poll_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('poll_data') && Mage::registry('poll_data')->getId() ) {
            return Mage::helper('poll')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('poll_data')->getTitle()));
        } else {
            return Mage::helper('poll')->__('Add Item');
        }
    }
}