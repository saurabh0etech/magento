<?php
class Excellence_Test1_Block_Test1 extends Mage_Core_Block_Template
{
/*public function getData(){
return "its working";
}*/
protected function _prepareLayout() {
	parent::_prepareLayout();

	$pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
	$pager->setAvailableLimit(array('all' => 'all', 5 => 5, 10 => 10, 20 => 20 ));
	$pager->setCollection($this->getCollection());
	$this->setChild('pager', $pager);
	$this->getCollection()->load();
	return $this;
}
public function showData($module){
	$data = Mage::getModel('test1/test1')->showData();
	return $data;
}
public function showPro($module1){
	$data1 = Mage::getModel('test1/profile')->showProfile();	
	return $data1;
}
public function showJoin($data){
	$srch = $this->getRequest()->getPost();							
	$data= $srch['srch'];
	$data2 = Mage::getModel('test1/profile')->joinData($data);	
	return $data2;
}
/*public function showSearch(){
	$srch = $this->getRequest()->getPost();							
	$data= $srch['srch'];	
	$data2 = Mage::getModel('test1/profile')->loadByField($data);	
	return $data2;
}*/
public function __construct() {
	parent::__construct();
	$rows = Mage::getModel('test1/profile')->getCollection();
	$this->setCollection($rows);
       // parent::_prepareCollection();
}

public function getPagerHtml() {
	return $this->getChildHtml('pager');
}
/*	$system= Mage::getStoreConfig(‘customer/create_account/email_domain’,Mage::app()->getStore()); 
	return $system;
}*/
}