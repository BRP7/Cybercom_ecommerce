<?php

class Catalog_Block_Category_View extends Core_Block_Template{
    public function __construct(){
            $this->setTemplate("catalog/product/view.phtml");
    }
    public function showList() {
        $findQues = $this->getRequest()->getQueryData('id');
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        if($findQues){ 
            $productCollection = $productCollection->addFieldToFilter("category_id", $findQues);
            // print_r($productCollection);
        }
        return $productCollection->getData();
    }

}