<?php

require_once('../app/Mage.php'); //Path to Magento
require_once 'abstract.php';
umask(0);
Mage::app();


$url = '/1.5-inch-Three-Ring-Binders/Jean-1.5-inch-TE-Binder';
$test= Mage::getResourceModel('enterprise/sysreport_tool');
$test->parseUrl($url);

var_dump($test);