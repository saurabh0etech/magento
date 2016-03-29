<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Newform extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('employee_form', array('legend'=>Mage::helper('employee')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('employee')->__('Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));  
		
     $fieldset->addField('radio', 'radio', array(
          'label'     => Mage::helper('employee')->__('Radio'),
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
     $fieldset->addField('radio2', 'radios', array(
          'label'     => Mage::helper('employee')->__('Radios'),
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '2',
          'values' => array(
                            array('value'=>'1','label'=>'Radio1'),
                            array('value'=>'2','label'=>'Radio2'),
                            array('value'=>'3','label'=>'Radio3'),
                       ),
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
    $fieldset->addField('multiselect2', 'multiselect', array( 'label' => Mage::helper('employee')->__('Select Type2'), 'class' => 'required-entry', 'required' => true, 'name' => 'title', 'onclick' => "return false;", 'onchange' => "return false;", 'value' => '4', 'values' => array( '-1'=> array( 'label' => 'Please Select..', 'value' => '-1'), '1' => array( 'value'=> array(array('value'=>'2' , 'label' => 'Option2') , array('value'=>'3' , 'label' =>'Option3') ), 'label' => 'Size'  ), '2' => array( 'value'=> array(array('value'=>'4' , 'label' => 'Option4') , array('value'=>'5' , 'label' =>'Option5') ), 'label' => 'Color' ),  ), 'disabled' => false, 'readonly' => false, 'after_element_html' => '<small>Comments</small>', 'tabindex' => 1 )); 
     
      if ( Mage::getSingleton('adminhtml/session')->getEmployeeData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getEmployeeData());
          Mage::getSingleton('adminhtml/session')->setEmployeeData(null);
      } elseif ( Mage::registry('employee_data') ) {
          $form->setValues(Mage::registry('employee_data')->getData());
      }
      return parent::_prepareForm();
  }
}