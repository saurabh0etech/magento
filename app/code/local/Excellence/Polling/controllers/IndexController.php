<?php
class Excellence_Polling_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/polling?id=15 
    	 *  or
    	 * http://site.com/polling/id/15 	
    	 */
    	/* 
		$polling_id = $this->getRequest()->getParam('id');

  		if($polling_id != null && $polling_id != '')	{
			$polling = Mage::getModel('polling/polling')->load($polling_id)->getData();
		} else {
			$polling = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($polling == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$pollingTable = $resource->getTableName('polling');
			
			$select = $read->select()
			   ->from($pollingTable,array('polling_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$polling = $read->fetchRow($select);
		}
		Mage::register('polling', $polling);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}