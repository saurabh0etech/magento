<?php
class Excellence_Polling_Block_Adminhtml_Polling extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_polling';
    $this->_blockGroup = 'polling';
    $this->_headerText = Mage::helper('polling')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('polling')->__('Add Item');
    parent::__construct();
  }
}