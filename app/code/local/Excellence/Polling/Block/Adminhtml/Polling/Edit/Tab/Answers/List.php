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
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Excellence_Polling_Block_Adminhtml_Polling_Edit_Tab_Answers_List extends Mage_Adminhtml_Block_Template
{
    public function __construct()
    {       
      $this->setTemplate('polling/answers/list.phtml'); 
       
    }
    
    protected function _toHtml()
    {
        if( !Mage::registry('polling_data') ) {
            $this->assign('answers', false);
            return parent::_toHtml();
        }
        $id     = $this->getRequest()->getParam('id');  
        //echo $id; die();       
        $model1= Mage::getResourceModel('polling/answer')->fetchAnswer($id);
         //print_r($id); die();
            
        $this->assign('answers', $model1);

        return parent::_toHtml();
    }


    protected function _prepareLayout()
    {
        $this->setChild('deleteButton',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('polling')->__('Delete'),
                    'onclick'   => 'answer.del(this)',
                    'class' => 'delete'
                ))
        );

        $this->setChild('addButton',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('polling')->__('Add New Answer'),
                    'onclick'   => 'answer.add(this)',
                    'class' => 'add'
                ))
        );
        return parent::_prepareLayout();
    }

    public function getDeleteButtonHtml()
    {
        return $this->getChildHtml('deleteButton');
    }

    public function getAddButtonHtml()
    {
        return $this->getChildHtml('addButton');
    }
}
