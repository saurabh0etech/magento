<?php

class Excellence_Phone_Block_Adminhtml_Phone_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('phone_form', array('legend'=>Mage::helper('phone')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('phone')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('phone')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('phone')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('phone')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('phone')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('phone')->__('Content'),
          'title'     => Mage::helper('phone')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getPhoneData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPhoneData());
          Mage::getSingleton('adminhtml/session')->setPhoneData(null);
      } elseif ( Mage::registry('phone_data') ) {
          $form->setValues(Mage::registry('phone_data')->getData());
      }
      return parent::_prepareForm();
  }
}