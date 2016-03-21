<?php
class Excellence_Phone_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/phone?id=15 
    	 *  or
    	 * http://site.com/phone/id/15 	
    	 */
    	/* 
		$phone_id = $this->getRequest()->getParam('id');

  		if($phone_id != null && $phone_id != '')	{
			$phone = Mage::getModel('phone/phone')->load($phone_id)->getData();
		} else {
			$phone = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($phone == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$phoneTable = $resource->getTableName('phone');
			
			$select = $read->select()
			   ->from($phoneTable,array('phone_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$phone = $read->fetchRow($select);
		}
		Mage::register('phone', $phone);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}