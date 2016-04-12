<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Form2 extends Mage_Adminhtml_Block_Widget_Form
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
		$fieldset->addField('select', 'select', array(
          'label'     => Mage::helper('employee')->__('Select'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'values' => array('-1'=>'Please Select..','1' => 'Option1','2' => 'Option2', '3' => 'Option3'),
          'disabled' => false,
          'readonly' => false,          
          'tabindex' => 1
        )); 
      $fieldset->addField('select2', 'select', array(
          'label'     => Mage::helper('employee')->__('Select Type2'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '4',
          'values' => array(
                                '-1'=>'Please Select..',
                                '1' => array(
                                                'value'=> array(array('value'=>'2' , 'label' => 'Option2') , array('value'=>'3' , 'label' =>'Option3') ),
                                                'label' => 'Size'    
                                           ),
                                '2' => array(
                                                'value'=> array(array('value'=>'4' , 'label' => 'Option4') , array('value'=>'5' , 'label' =>'Option5') ),
                                                'label' => 'Color'   
                                           ),                                         
                                  
                           ),
          'disabled' => false,
          'readonly' => false,         
          'tabindex' => 1
        ));   
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('employee')->__('Description'),
          'title'     => Mage::helper('employee')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
      $fieldset->addField('multiline', 'multiline', array(
          'label'     => Mage::helper('employee')->__('Multi Line'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'style'   => "border:10px",
          'value'  => 'hello !!',
          'disabled' => false,
          'readonly' => true,         
          'tabindex' => 1
        ));

     
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