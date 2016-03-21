<?php
$installer = $this;
$installer->startSetup();
$setup = Mage::getModel('customer/entity_setup', 'core_setup');
$setup->addAttribute('customer', 'phone_no', array(
  'label'     => 'phone_no',
  'type'      => 'varchar',
  'input'     => 'text',
  'visible'   => 1,
  'required'  => 1,
  'position'  => 1,
  'global'    => 1,
  'required'  => 0,
  'user_defined'  => 1,
  'default'   => NULL,
  'visible_on_front' => 1,
  ));
if (version_compare(Mage::getVersion(), '1.6.0', '<='))
{
 $customer = Mage::getModel('customer/customer');
 $attrSetId = $customer->getResource()->getEntityType()->getDefaultAttributeSetId();
 $setup->addAttributeToSet('customer', $attrSetId, 'General', 'phone_no');
}
if (version_compare(Mage::getVersion(), '1.4.2', '>='))
{
   Mage::getSingleton('eav/config')
   ->getAttribute('customer', 'phone_no')
   ->setData('used_in_forms', array('adminhtml_customer','customer_account_create','customer_account_edit','checkout_register'))
   ->save();
}
$installer->endSetup();