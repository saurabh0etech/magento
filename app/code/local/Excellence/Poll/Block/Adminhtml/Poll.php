<?php
class Excellence_Poll_Block_Adminhtml_Poll extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_poll';
    $this->_blockGroup = 'poll';
    $this->_headerText = Mage::helper('poll')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('poll')->__('Add Item');
    parent::__construct();
  }
}