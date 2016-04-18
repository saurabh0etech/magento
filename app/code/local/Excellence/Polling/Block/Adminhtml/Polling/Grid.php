<?php

class Excellence_Polling_Block_Adminhtml_Polling_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('pollingGrid');
      $this->setDefaultSort('polling_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('polling/polling')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
      
      $collection1 = Mage::getModel('polling/answer')->getCollection();
      $this->setCollection($collection1);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('polling_id', array(
          'header'    => Mage::helper('polling')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'polling_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('polling')->__('Poll Questions'),
          'align'     =>'left',
          'width'     => '250px',
          'index'     => 'title',
      ));

       $this->addColumn('date_posted', array(
            'header'    => Mage::helper('poll')->__('Date Posted'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'datetime',
            'index'     => 'date_posted',
            'format'  => Mage::app()->getLocale()->getDateFormat()
        ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('polling')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('polling')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Open',
              2 => 'Closed',
          ),
      ));	  
        
		
		$this->addExportType('*/*/exportCsv', Mage::helper('polling')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('polling')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('polling_id');
        $this->getMassactionBlock()->setFormFieldName('polling');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('polling')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('polling')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('polling/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('polling')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('polling')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}