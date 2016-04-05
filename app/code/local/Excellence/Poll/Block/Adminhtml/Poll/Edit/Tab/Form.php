<?php

class Excellence_Poll_Block_Adminhtml_Poll_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('poll_form', array('legend'=>Mage::helper('poll')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('poll')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('poll')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('poll')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('poll')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('poll')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('poll')->__('Content'),
          'title'     => Mage::helper('poll')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getPollData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPollData());
          Mage::getSingleton('adminhtml/session')->setPollData(null);
      } elseif ( Mage::registry('poll_data') ) {
          $form->setValues(Mage::registry('poll_data')->getData());
      }
      return parent::_prepareForm();
  }
}