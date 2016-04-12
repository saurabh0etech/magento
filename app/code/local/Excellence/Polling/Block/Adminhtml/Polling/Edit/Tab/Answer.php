<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tab_Answer extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
     
      $fieldset = $form->addFieldset('polling_form', array('legend'=>Mage::helper('polling')->__('Poll Answers')));
     
      $fieldset->addField('answer_title', 'text', array(
                    'name'      => 'answer_title',
                    'title'     => Mage::helper('polling')->__('Answer Title-1'),
                    'label'     => Mage::helper('polling')->__('Answer Title-1'),
                    'required'  => true,
                    'class'     => 'required-entry',
                )
        );

        $fieldset->addField('votes_count', 'text', array(
                    'name'      => 'votes_count',
                    'title'     => Mage::helper('polling')->__('Votes Count-1'),
                    'label'     => Mage::helper('polling')->__('Votes Count-1'),
                    'class'     => 'validate-not-negative-number'
                )
        );
        
        $fieldset->addField('answer_title2', 'text', array(
                    'name'      => 'answer_title2',
                    'title'     => Mage::helper('polling')->__('Answer Title-2'),
                    'label'     => Mage::helper('polling')->__('Answer Title-2'),
                    'required'  => true,
                    'class'     => 'required-entry',
                )
        );

        $fieldset->addField('votes_count2', 'text', array(
                    'name'      => 'votes_count2',
                    'title'     => Mage::helper('polling')->__('Votes Count-2'),
                    'label'     => Mage::helper('polling')->__('Votes Count-2'),
                    'class'     => 'validate-not-negative-number'
                )
        );
        $fieldset->addField('answer_title3', 'text', array(
                    'name'      => 'answer_title3',
                    'title'     => Mage::helper('polling')->__('Answer Title-3'),
                    'label'     => Mage::helper('polling')->__('Answer Title-3'),
                    'required'  => true,
                    'class'     => 'required-entry',
                )
        );

        $fieldset->addField('votes_count3', 'text', array(
                    'name'      => 'votes_count3',
                    'title'     => Mage::helper('polling')->__('Votes Count-3'),
                    'label'     => Mage::helper('polling')->__('Votes Count-3'),
                    'class'     => 'validate-not-negative-number'
                )
        );
        $fieldset->addField('answer_title4', 'text', array(
                    'name'      => 'answer_title4',
                    'title'     => Mage::helper('polling')->__('Answer Title-4'),
                    'label'     => Mage::helper('polling')->__('Answer Title-4'),
                    'required'  => true,
                    'class'     => 'required-entry',
                )
        );

        $fieldset->addField('votes_count4', 'text', array(
                    'name'      => 'votes_count4',
                    'title'     => Mage::helper('polling')->__('Votes Count-4'),
                    'label'     => Mage::helper('polling')->__('Votes Count-4'),
                    'class'     => 'validate-not-negative-number'
                )
        );

        $fieldset->addField('polling_id', 'hidden', array(
                    'name'      => 'polling_id',
                    'no_span'   => true,
                    'value'     => $this->getRequest()->getParam('id'),
                )
        );

if ( Mage::getSingleton('adminhtml/session')->getAnswerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAnswerData());
          Mage::getSingleton('adminhtml/session')->setAnswerData(null);
      } elseif ( Mage::registry('answer_data') ) {
          $form->setValues(Mage::registry('answer_data')->getData());
      }
       $this->setForm($form);


      
  }  
        
}