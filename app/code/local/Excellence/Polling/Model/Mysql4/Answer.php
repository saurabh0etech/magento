<?php

class Excellence_Polling_Model_Mysql4_Answer extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {       
        $this->_init('polling/answer', 'answer_id');
    }
    public function fetchAnswer($id2){       
    	$table = $this->getMainTable();  
        //$where = $this->_getReadAdapter()->quoteInto('userid.user_id like ?',$id2);      
        $select = $this->_getReadAdapter()->select()->from($table,array('answer_id', 'answer_title','polling_id', 'votes_count'))->order('answer_id', 'DESC')->limit(4);
        $id = $this->_getReadAdapter()->fetchAll($select);
        return $id;
    }
    public function updateData($id2){         

        $model = Mage::getModel('polling/answer')->load($id2);
        $vote=$model['votes_count'] + 1;
        $table = $this->getMainTable(); 
        $where = $this->_getWriteAdapter()->quoteInto('answer_id = ?', $id2); 
        $query = $this->_getWriteAdapter()->update($table, array('votes_count'=>$vote),$where); 
    }
    public function getVotes($id2){
        //echo $id2; die();
        $table = $this->getMainTable();
        $where = $this->_getWriteAdapter()->quoteInto('polling_id = ?', $id2);
        $select = $this->_getReadAdapter()->select()->from($table,array('answer_title','votes_count'))->where($where);
        $data = $this->_getReadAdapter()->fetchAll($select);
        //print_r($id); die();
        return $data;
    
}
    
}