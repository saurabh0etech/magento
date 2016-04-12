<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
     
      $fieldset = $form->addFieldset('polling_form', array('legend'=>Mage::helper('polling')->__('Poll Questions')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('polling')->__('Poll Question'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));     
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('polling')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('polling')->__('Open'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('polling')->__('Closed'),
              ),
          ),
      ));   

      $fieldset->addField('date', 'date', array(
          'label'     => Mage::helper('polling')->__('Date'),          
          'tabindex' => 1,
          'image' => $this->getSkinUrl('images/grid-cal.gif'),
          'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT)
        ));  
      
     
      if ( Mage::getSingleton('adminhtml/session')->getPollingData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPollingData());
          Mage::getSingleton('adminhtml/session')->setPollingData(null);
      } elseif ( Mage::registry('polling_data') ) {
          $form->setValues(Mage::registry('polling_data')->getData());
      }
       $this->setForm($form);
      return parent::_prepareForm();
  }
}