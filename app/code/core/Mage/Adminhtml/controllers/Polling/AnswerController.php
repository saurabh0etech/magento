<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml poll answer controller
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Mage_Adminhtml_Polling_AnswerController extends Mage_Adminhtml_Controller_Action
{
    public function editAction()
    {
        $this->loadLayout();

        $this->_setActiveMenu('polling');
        $this->_addBreadcrumb(Mage::helper('polling')->__('Poll Manager'),
                              Mage::helper('polling')->__('Poll Manager'), $this->getUrl('*/*/'));
        $this->_addBreadcrumb(Mage::helper('polling')->__('Edit Poll Answer'),
                              Mage::helper('polling')->__('Edit Poll Answer'));

        $this->_addContent($this->getLayout()->createBlock('adminhtml/polling_answer_edit'));

        $this->renderLayout();
    }

    public function saveAction()
    {
        //print '@@';echo ""
        echo "hello"; die();
        if ( $post = $this->getRequest()->getPost() ) {
            try {
                $model = Mage::getModel('polling/answer');
                $model->setData($post)
                    ->setId($this->getRequest()->getParam('id'))
                    ->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('polling')->__('The answer has been saved.'));
                $this->_redirect('*/polling/edit',
                                 array('id' => $this->getRequest()->getParam('polling_id'), 'tab' => 'answers_section'));
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function gridAction()
    {
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('adminhtml/poll_edit_tab_answers_grid')->toHtml()
        );
    }

    public function jsonSaveAction()
    {
        $response = new Varien_Object();
        $response->setError(0);

        if ( $post = $this->getRequest()->getPost() ) {
            $data = Zend_Json::decode($post['data']);
            try {
                if( trim($data['answer_title']) == '' ) {
                    throw new Exception(Mage::helper('polling')->__('Invalid Answer.'));
                }
                $model = Mage::getModel('polling/answer');
                $model->setData($data)
                    ->save();
            } catch (Exception $e) {
                $response->setError(1);
                $response->setMessage($e->getMessage());
            }
        }
        $this->getResponse()->setBody( $response->toJson() );
    }

    public function jsonDeleteAction()
    {
        $response = new Varien_Object();
        $response->setError(0);

        if ( $id = $this->getRequest()->getParam('id') ) {
            try {
                $model = Mage::getModel('polling/answer');
                $model->setId(Zend_Json::decode($id))
                    ->delete();
            } catch (Exception $e) {
                $response->setError(1);
                $response->setMessage($e->getMessage());
            }
        } else {
            $response->setError(1);
            $response->setMessage(Mage::helper('polling')->__('Unable to find an answer to delete.'));
        }
        $this->getResponse()->setBody( $response->toJson() );
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('polling');
    }

}
