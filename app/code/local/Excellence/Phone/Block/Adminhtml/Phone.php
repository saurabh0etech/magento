<?php
class Excellence_Phone_Block_Adminhtml_Phone extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_phone';
    $this->_blockGroup = 'phone';
    $this->_headerText = Mage::helper('phone')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('phone')->__('Add Item');
    parent::__construct();
  }
}