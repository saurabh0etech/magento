<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tab_Answers_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
     
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
                    'value'     => $this->getRequest()->getParam('id'),
                )
        );



         $this->setForm($form);
  }  
        
}