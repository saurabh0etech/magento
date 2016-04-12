<?php

class Excellence_Polling_Model_Mysql4_Polling extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the polling_id refers to the key field in your database table.
        $this->_init('polling/polling', 'polling_id');
    }

 //    public function joinData() {				
 //    	$table = $this->getMainTable();        
 //        $select = $this->_getReadAdapter()->select()->from($table,array('title','polling_id'))->Order('polling_id', 'DESC')->limit(1);
 //        $id = $this->_getReadAdapter()->fetchAll($select);
 //        return $id;        
	// }  
    // public function updateId($id2){ 
    // //echo $id2; die();        
    //     $table = $this->getMainTable(); 
    //     $where = $this->_getWriteAdapter()->quoteInto('polling_id = ?', 1); 
    //     $query = $this->_getWriteAdapter()->update($table, array('user_id'=>$id2),$where); 
    // }
}