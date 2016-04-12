<?php

class Excellence_Polling_Adminhtml_PollingController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
     ->_setActiveMenu('polling/items')
     ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
     
     return $this;
 }   
 
 public function indexAction() {
  $this->_initAction()
  ->renderLayout();
}


public function editAction() { 
  $id     = $this->getRequest()->getParam('id');	
		//echo $id; die();	
  $model  = Mage::getModel('polling/polling')->load($id);				
  if ($model->getId() || $id == 0) {
     $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
     if (!empty($data)) {
        $model->setData($data);
    }
    Mage::register('polling_data', $model);
    $model1  = Mage::getModel('polling/answer')->load($id);
    Mage::register('answer_data', $model1);
         //print_r($model1);die();
        //die();
    $this->loadLayout();
    $this->_setActiveMenu('polling/items');

    $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
    $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

    $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

    $this->_addContent($this->getLayout()->createBlock('polling/adminhtml_polling_edit'))
    ->_addLeft($this->getLayout()->createBlock('polling/adminhtml_polling_edit_tabs'));

    $this->renderLayout();
} else {
 Mage::getSingleton('adminhtml/session')->addError(Mage::helper('polling')->__('Item does not exist'));
 $this->_redirect('*/*/');
}
$model1  = Mage::getModel('polling/answer')->load($id);


}

public function newAction() {
  $this->_forward('edit');
		//$this->_addContent($this->getLayout()->createBlock('polling/adminhtml_polling_edit')) ->_addLeft($this->getLayout()->createBlock('polling/adminhtml_polling_edit_tabs')); 
}

public function saveAction() {

  if ($data = $this->getRequest()->getPost()) {

     $model = Mage::getModel('polling/polling');		
     $model->setData($data)
     ->setId($this->getRequest()->getParam('id'));
				//print_r($model); die();
     
     try {
        if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
           $model->setCreatedTime(now())
           ->setUpdateTime(now());
       } else {
           $model->setUpdateTime(now());
       }				
       $model->save();

       if($model->save()){
        
        $data2 = $this->getRequest()->getPost();
				//print_r($data2); die();					
        
        $pollingid=$this->getRequest()->getParam('id');
			//	array_splice($data2,2);
        array_shift($data2);
        array_shift($data2);
        array_shift($data2);
        $answer_array=$data2;
        $new_array=array();
        foreach($answer_array as $ans){
         $new_array[]=$ans;
     }
     for($i=0;$i<8;$i+=2){
         $model1 = Mage::getModel('polling/answer');	
         $model1->setPollingId($model->getId($this->getRequest()->getParam('id')));
         $model1->setAnswerTitle($new_array[$i]);
         $model1->setVotesCount($new_array[$i+1]);
         $model1->save();
     }            	

 }							
 
 Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('polling')->__('Item was successfully saved'));
 Mage::getSingleton('adminhtml/session')->setFormData(false);

 if ($this->getRequest()->getParam('back')) {
   $this->_redirect('*/*/edit', array('id' => $model->getId()));
   return;
}
$this->_redirect('*/*/');
return;
} catch (Exception $e) {
    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
    Mage::getSingleton('adminhtml/session')->setFormData($data);
    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
    return;
}
}       

Mage::getSingleton('adminhtml/session')->addError(Mage::helper('polling')->__('Unable to find item to save'));
$this->_redirect('*/*/');
}

public function deleteAction() {
  if( $this->getRequest()->getParam('id') > 0 ) {
     try {
        $model = Mage::getModel('polling/polling');
        
        $model->setId($this->getRequest()->getParam('id'))
        ->delete();
        
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
        $this->_redirect('*/*/');
    } catch (Exception $e) {
        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
    }
}
$this->_redirect('*/*/');
}

public function massDeleteAction() {
    $pollingIds = $this->getRequest()->getParam('polling');
    if(!is_array($pollingIds)) {
     Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
 } else {
    try {
        foreach ($pollingIds as $pollingId) {
            $polling = Mage::getModel('polling/polling')->load($pollingId);
            $polling->delete();
        }
        Mage::getSingleton('adminhtml/session')->addSuccess(
            Mage::helper('adminhtml')->__(
                'Total of %d record(s) were successfully deleted', count($pollingIds)
                )
            );
    } catch (Exception $e) {
        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
    }
}
$this->_redirect('*/*/index');
}

public function massStatusAction()
{
    $pollingIds = $this->getRequest()->getParam('polling');
    if(!is_array($pollingIds)) {
        Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
    } else {
        try {
            foreach ($pollingIds as $pollingId) {
                $polling = Mage::getSingleton('polling/polling')
                ->load($pollingId)
                ->setStatus($this->getRequest()->getParam('status'))
                ->setIsMassupdate(true)
                ->save();
            }
            $this->_getSession()->addSuccess(
                $this->__('Total of %d record(s) were successfully updated', count($pollingIds))
                );
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
    }
    $this->_redirect('*/*/index');
}

public function exportCsvAction()
{
    $fileName   = 'polling.csv';
    $content    = $this->getLayout()->createBlock('polling/adminhtml_polling_grid')
    ->getCsv();

    $this->_sendUploadResponse($fileName, $content);
}

public function exportXmlAction()
{
    $fileName   = 'polling.xml';
    $content    = $this->getLayout()->createBlock('polling/adminhtml_polling_grid')
    ->getXml();

    $this->_sendUploadResponse($fileName, $content);
}

protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
{
    $response = $this->getResponse();
    $response->setHeader('HTTP/1.1 200 OK','');
    $response->setHeader('Pragma', 'public', true);
    $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
    $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
    $response->setHeader('Last-Modified', date('r'));
    $response->setHeader('Accept-Ranges', 'bytes');
    $response->setHeader('Content-Length', strlen($content));
    $response->setHeader('Content-type', $contentType);
    $response->setBody($content);
    $response->sendResponse();
    die;
}
}
