<?php
class Excellence_Poll_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/poll?id=15 
    	 *  or
    	 * http://site.com/poll/id/15 	
    	 */
    	/* 
		$poll_id = $this->getRequest()->getParam('id');

  		if($poll_id != null && $poll_id != '')	{
			$poll = Mage::getModel('poll/poll')->load($poll_id)->getData();
		} else {
			$poll = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($poll == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$pollTable = $resource->getTableName('poll');
			
			$select = $read->select()
			   ->from($pollTable,array('poll_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$poll = $read->fetchRow($select);
		}
		Mage::register('poll', $poll);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}