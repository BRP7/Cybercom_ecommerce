<?php

class Tempconverter_Block_Admin_List extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate("tempconverter/admin/list.phtml");
    }
 public function getCollectionsData(){
    $brandCollection = Mage::getModel("tempconverter/tempconverter")->getCollection();
    $brandCollection->addFieldToFilter('unit', 'Celsius');
    return $brandCollection->getData();
 }
    

}