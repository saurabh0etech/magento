<?php
class Excellence_Test1_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();     
		$this->renderLayout();
	}
	/*public function insertAction(){
		$this->loadLayout();    	
		$post = $this->getRequest()->getParams();
		if(isset($post['sub']) && !empty($post['title']) && !empty($post['content'])){
			$model = Mage::getModel('test1/test1');   
			$data = array("title" => $post['title'],
				"filename" => $post['filename'],
				"content" => $post['content'],
				"status" => $post['status']);		   
			$model->setData($data);
			$model->save();			
			Mage::getSingleton('core/session')->addSuccess('Successfully save data...');
			$this->_redirect('test1/index');			
		}
		else{
			Mage::getSingleton('core/session')->addSuccess('Please add fields correctly...');
		}
		$this->renderLayout();
	}

	public function deleteAction(){
		$this->loadLayout();
		$id = Mage::app()->getRequest()->getParam("del");            
		if(Mage::getModel('test1/test1')->deleteData($id)){
			Mage::getSingleton('core/session')->addSuccess(Mage::helper('test1')->__('Row Deleted'));
			$this->_redirect('test1/index');
		}
		else{
			Mage::getSingleton('core/session')->addError(Mage::helper('test1')->__('Some Error Occured.... Please try again...'));
		}     
		$this->renderLayout();
	}

	public function editAction(){
		$this->loadLayout();
		$this->loadLayout();
		$id = Mage::app()->getRequest()->getParam("edit");        
		Mage::register('edit', $id);
		$status = Mage::getModel('test1/test1')->fetchData($id);
		Mage::register('title', $status['title']);
		Mage::register('filename', $status['filename']); 
		Mage::register('content', $status['content']); 
		Mage::register('status', $status['status']);        
		$row = Mage::app()->getRequest()->getPost();
		if(isset($row['sub']) && !empty($row['title']) && !empty($row['content'])){
			$model = Mage::getModel('test1/test1')->saveData($row,$id);   
			$this->_redirect('test1/index');		
			Mage::getSingleton('core/session')->addSuccess('Successfully save data...');						
		}
		else{
			Mage::getSingleton('core/session')->addSuccess('Please add fields correctly...');
		}
		$this->renderLayout();
	}*/
	public function inputAction()
	{
		$this->loadLayout();
		$post = $this->getRequest()->getParams();
		if(isset($post['sub']) && !empty($post['name']) && !empty($post['age']) && !empty($post['city']) && !empty($post['email']) && !empty($post['contact'])){
			$model = Mage::getModel('test1/profile');   
			$data = array("name" => $post['name'],
				"age" => $post['age'],
				"city" => $post['city']);		   
			$model->setData($data);
			$model->save();
			$model1 = Mage::getModel('test1/contact');   
			$data1 = array("email" => $post['email'],
				"contact" => $post['contact']);		   
			$model1->setData($data1);
			$model1->save();			
			Mage::getSingleton('core/session')->addSuccess('Successfully save data...');
			$this->_redirect('test1/index');			
		}
		else{
			Mage::getSingleton('core/session')->addSuccess('Please add fields correctly...');
		}     
		$this->renderLayout();
	}
	public function deleteAction(){
		$this->loadLayout();
		$id = Mage::app()->getRequest()->getParam("del");            
		if(!empty($id)){
			Mage::getModel('test1/profile')->deleteData($id);
			Mage::getModel('test1/contact')->deleteContact($id);
			Mage::getSingleton('core/session')->addSuccess(Mage::helper('test1')->__('Row Deleted'));
			$this->_redirect('test1/index');
		}
		else{
			Mage::getSingleton('core/session')->addError(Mage::helper('test1')->__('Some Error Occured.... Please try again...'));
		}     
		$this->renderLayout();
	}
	public function updateAction()
	{
		$this->loadLayout();
		$id = Mage::app()->getRequest()->getParam("upd");        
		Mage::register('upd', $id);
		$pro = Mage::getModel('test1/profile')->fetchData($id);
		Mage::register('name', $pro['name']);
		Mage::register('age', $pro['age']); 
		Mage::register('city', $pro['city']);
		$con = Mage::getModel('test1/contact')->fetchCon($id);
		Mage::register('email', $con['email']);		
		Mage::register('contact', $con['contact']);		       
		$row = Mage::app()->getRequest()->getPost();
		if(isset($row['sub']) && !empty($row['name']) && !empty($row['age']) && !empty($row['city']) && !empty($row['email']) && !empty($row['contact'])){
			$model = Mage::getModel('test1/profile')->savePro($row,$id);
			$model1 = Mage::getModel('test1/contact')->saveCon($row,$id);   
			$this->_redirect('test1/index');		
			Mage::getSingleton('core/session')->addSuccess('Successfully save data...');						
		}
		else{
			Mage::getSingleton('core/session')->addSuccess('Please add fields correctly...');
		}    
		$this->renderLayout();
	}
	public function searchAction()
	{
		$this->loadLayout();			
		$this->renderLayout();	
	}
	/*public function limitAction()
	{
		$this->loadLayout();
		$lim = Mage::app()->getRequest()->getParam("limit");        
		Mage::register('limit', $lim);		
		$this->renderLayout();	
	}*/
	
}