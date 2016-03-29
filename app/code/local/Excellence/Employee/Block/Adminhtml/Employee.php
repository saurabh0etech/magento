<?php
class Excellence_Employee_Block_Adminhtml_Employee extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		
		$this->_controller = 'adminhtml_employee';
		$this->_blockGroup = 'employee';
		$this->_headerText = Mage::helper('employee')->__('Employee Manager');
		$this->_addButtonLabel = Mage::helper('employee')->__('Add Employee');
		
		
		$this->_addButton('button1', array(
			'label'     => Mage::helper('employee')->__('Button Label1'),
			'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/button1') .'\')',
			'class'     => 'add',
			));
		$this->_addButton('button2', array(
			'label'     => Mage::helper('employee')->__('Button Label2'),
			'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/button2') .'\')',
			'class'     => 'remove',
			));
		parent::__construct();
	}
}