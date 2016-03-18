<?php

class Excellence_Test1_Model_Mysql4_Profile extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{    
        // Note that the mydata_id refers to the key field in your database table.
		$this->_init('test1/profile', 'pro_id');
	}
	public function joinData($value) {		
		$lim = Mage::app()->getRequest()->getParam("limit");
		$page = Mage::app()->getRequest()->getParam("p");		
		if($page==""){
			$offset     =   ($page) * $lim;
		}
		else{ 
			$offset     =   ($page - 1) * $lim;	
		}	
		$table = $this->getMainTable();
		$table2 = $this->getTable('test1/contact');
		$cond = $this->_getReadAdapter()->quoteInto('profile.pro_id = contact.con_id','');
		$where = $this->_getReadAdapter()->quoteInto('profile.name like ?','%'.$value.'%');		
		$select = $this->_getReadAdapter()->select()->from(array('profile'=>$table))->join(array('contact'=>$table2), $cond)->where($where)->limit($lim,$offset);
		$result = $this->_getReadAdapter()->fetchAll($select);		
		//echo $select;
		//echo $value;
		return $result;
	}
	/*public function loadByField($value){
		$limit = Mage::app()->getRequest()->getParam("limit");
		$page = Mage::app()->getRequest()->getParam("p");		
		if($page==""){
			$offset     =   ($page) * $limit;
		}
		else{ 
			$offset     =   ($page - 1) * $limit;	
		}	
		$table = $this->getMainTable();
		$table2 = $this->getTable('test1/contact');
		$cond = $this->_getReadAdapter()->quoteInto('profile.pro_id = contact.con_id','');
		$where = $this->_getReadAdapter()->quoteInto('profile.name like ?','%'.$value.'%');        
		$select = $this->_getReadAdapter()->select()->from(array('profile'=>$table))->join(array('contact'=>$table2), $cond)->where($where)->limit($limit,$offset);
		$result = $this->_getReadAdapter()->fetchAll($select);
		echo $select;
		echo $value;		
		return $result;        
	}*/

}