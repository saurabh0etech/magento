<?php

class Excellence_Test1_Model_Test1 extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test1/test1');
    }
    public function showData(){
        return $this->getCollection();
    }
    /*public function setData(){
        return $module->save();
    }
    public function deleteData($id){
        return $this->load($id)->delete();
    }
    public function deleteContact($id){
        return $this->load($id)->delete();
    }*/
    public function fetchData($id){
        $model = $this->load($id);
        $data =array('title'=>$model->getTitle(),
            'filename'=>$model->getFilename(),
            'content'=>$model->getContent(),
            'status'=>$model->getStatus());
        return $data;
    }
    public function saveData($id1,$id2){
        $model = $this->load($id2);
        $model->setTitle($id1['title']);
        $model->setContent($id1['content']);
        $model->setStatus($id1['status']);
        return $model->save(); 

    }
    /*public function joinData(){
        //$data= $this->joinUs();
        //return $data;
        print_r("expression");
   }*/

}