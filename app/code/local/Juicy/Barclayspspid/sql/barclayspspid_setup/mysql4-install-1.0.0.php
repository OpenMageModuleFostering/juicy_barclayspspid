<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer->startSetup();


try
{
	$installer->run("
	DELETE FROM `{$installer->getTable('sales_order_status')}` WHERE (`status`='pys_failed_hosted_payment');
	
	
	INSERT INTO `{$installer->getTable('sales_order_status')}` (`status`, `label`) VALUES ('barclayspspid_authorized', 'Barclays - Authorized');
	
	");
}
catch(Exception $exc)
{
	Mage::log("Error during script installation: ". $exc->__toString());
}


$installer->endSetup();