<?php

require_once('../app/Mage.php');
umask(0);
Mage::app();

$file = 'url_rewrites.csv';
$path = Mage::getBaseDir('var') . DS . 'import' . DS . $file;
$csv = new Varien_File_Csv();
$data = $csv->getData($path);



//csv must have 3 columns store_id, identifier, target_path

for ($i=0; $i<count($data) ; $i++) {

    Mage::getModel('core/url_rewrite')->loadByRequestPath($data[$i][1],$data[$i][0])
        ->setStoreId($data[$i][0])
        ->setOptions('RP')
        ->setRequestPath($data[$i][1])
        ->setTargetPath($data[$i][2])
        ->setEntityType(Mage_Core_Model_Url_Rewrite::TYPE_CUSTOM)


    //var_dump($data[$i][0],$data[$i][1],$data[$i][2]);

->save();


}