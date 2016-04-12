<?php
class Excellence_Polling_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{

		$post = $this->getRequest()->getParams();
		$id= $post['check'];		    	
		//$model = Mage::getModel('polling/answer')->updateData($id);    	
		$vote=$model['votes_count'] + 1;
		if(Mage::getSingleton('customer/session')->isLoggedIn()) 
		{
			$customerData = Mage::getSingleton('customer/session')->getCustomer();
			$customerId = $customerData->getId();
			//echo $customerId; die();
			$data1 = Mage::getModel('polling/answer')->saveId($customerId);    
			print_r($data1);
		} 	 

		$this->loadLayout(); 		
		$this->renderLayout();
	}
	public function submitAction()
	{
		$this->loadLayout();  
		$post = $this->getRequest()->getParams();
		$id= $post['check'];		  
		if(Mage::getSingleton('customer/session')->isLoggedIn()) 
		{
			$customerData = Mage::getSingleton('customer/session')->getCustomer();
			$customerId = $customerData->getId();	
			//echo $customerId; die();			
			$model1 = Mage::getModel('polling/userid')->srchId($customerId);  
			//print_r($model1); die(); 			
			if(empty($model1))
			{
				$model = Mage::getModel('polling/answer')->updateData($id);
				$model1 = Mage::getModel('polling/userid');
				$data = array("user_id" => $customerId);		   
				$model1->setData($data);		
				$model1->save();		
			}
			else{
				$this->_redirect('polling/index');
				Mage::getSingleton('core/session')->addSuccess('Users are not allowed to vote twice');
			}	

			$this->renderLayout();
		}
	}
}


