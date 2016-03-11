<?php

class Excellence_Test1_Model_Contact extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test1/contact');
    }
    public function deleteContact($id){
        return $this->load($id)->delete();
    }
    public function fetchCon($id){
        $model = $this->load($id);
        $data1 =array('email'=>$model->getEmail(),
            'contact'=>$model->getContact());                       
        return $data1;
    }
    public function saveCon($id2,$id3){
        $model1 = $this->load($id3);
        $model1->setEmail($id2['email']);
        $model1->setContact($id2['contact']);        
        return $model1->save(); 
}
}