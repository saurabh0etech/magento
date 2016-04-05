<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tab_Answer extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('polling_form', array('legend'=>Mage::helper('polling')->__('Poll Answers')));
     
      $fieldset->addField('answer_title', 'text', array(
                    'name'      => 'answer_title',
                    'title'     => Mage::helper('polling')->__('Answer Title'),
                    'label'     => Mage::helper('polling')->__('Answer Title'),
                    'required'  => true,
                    'class'     => 'required-entry',
                )
        );    
		
      $fieldset->addField('votes_count', 'text', array(
                    'name'      => 'votes_count',
                    'title'     => Mage::helper('polling')->__('Votes Count'),
                    'label'     => Mage::helper('polling')->__('Votes Count'),
                    'class'     => 'validate-not-negative-number'
                )
        );

        $fieldset->addField('polling_id', 'hidden', array(
                    'name'      => 'polling_id',
                    'no_span'   => true,
                )
        );
      
     
      if ( Mage::getSingleton('adminhtml/session')->getPollingData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPollingData());
          Mage::getSingleton('adminhtml/session')->setPollingData(null);
      } elseif ( Mage::registry('polling_data') ) {
          $form->setValues(Mage::registry('polling_data')->getData());
      }
      return parent::_prepareForm();
  }
}