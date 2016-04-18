<?php

class Excellence_Polling_Model_Mysql4_Userid extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the polling_id refers to the key field in your database table.
        $this->_init('polling/userid','id');
    }
    public function searchId($id2){  
        $table = $this->getMainTable(); 
        $where = $this->_getReadAdapter()->quoteInto('userid.user_id like ?',$id2);
        $select = $this->_getReadAdapter()->select()->from($table,array('user_id'))->where($where);
        $id = $this->_getReadAdapter()->fetchAll($select);
        return $id;
    }

    
}