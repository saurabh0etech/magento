<?php

class Excellence_Test1_Model_Profile extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test1/profile');
    }
    public function showProfile()
    {
    	return $this->getCollection();
    }
    public function joinData($value){        
     
        $model= Mage::getResourceModel('test1/profile')->joinData($value);
        return $model;

    }
    public function loadByField($value){        
        $id = Mage::getResourceModel('test1/profile')->loadByField($value);
        //print_r($id);   
        return $id;
    }

    public function deleteData($id){
        return $this->load($id)->delete();
    }
    public function fetchData($id){
        $model = $this->load($id);
        $data =array('name'=>$model->getName(),
            'age'=>$model->getAge(),
            'city'=>$model->getCity());
            //'email'=>$model->getCity(),
            //'contact'=>$model->getCity();           
        return $data;
    }
    public function savePro($id1,$id2){
        $model = $this->load($id2);
        $model->setName($id1['name']);
        $model->setAge($id1['age']);
        $model->setCity($id1['city']);
        return $model->save(); 

    }
}