<?php

/*class Excellence_Test1_Model_Mysql4_New extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the test1_id refers to the key field in your database table.
        $this->_init('new/new', 'new_id');
    }

     public function joinUs() {
     //$collection = Mage::getModel('mydata/profile')->getCollection();
       $table = $this->getMainTable();
        $table2 = $this->getTable('test1/contact');
        $cond = $this->_getReadAdapter()->quoteInto('new.new_id = contact.con_id','');
        //$where = $this->_getReadAdapter()->quoteInto('t1.list_id = "?"',123);
        $select = $this->_getReadAdapter()->select()->from(array('new'=>$table))->join(array('contact'=>$table2), $cond);
        echo $select;*/ 

        
    }
}