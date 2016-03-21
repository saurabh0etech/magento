<?php

class Excellence_Phone_Block_Adminhtml_Phone_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('phone_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('phone')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('phone')->__('Item Information'),
          'title'     => Mage::helper('phone')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('phone/adminhtml_phone_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}