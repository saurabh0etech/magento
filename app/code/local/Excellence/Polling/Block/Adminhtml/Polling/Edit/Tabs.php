<?php

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('polling_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('polling')->__('Poll Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('polling')->__('Poll Questions'),
          'title'     => Mage::helper('polling')->__('Poll Questions'),
          'content'   => $this->getLayout()->createBlock('polling/adminhtml_polling_edit_tab_form')->toHtml(),
      ));
      $this->addTab('answer_section', array(
          'label'     => Mage::helper('polling')->__('Poll Answers'),
          'title'     => Mage::helper('polling')->__('Poll Answers'),
          'content'   => $this->getLayout()->createBlock('polling/adminhtml_polling_edit_tab_answer')->toHtml(), 
                                     
            ));
     
      return parent::_beforeToHtml();
  }
}