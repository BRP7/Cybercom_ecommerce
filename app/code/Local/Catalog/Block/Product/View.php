<?php

class Catalog_Block_Product_View extends Core_Block_Template{
    public function __construct(){
        if($this->getRequest()->getQueryData('id')){
            $this->setTemplate("catalog/product/product.phtml");
        }else{
          $this->setTemplate("catalog/product/view.phtml");
      }
    }
    public function showList() {
        $findQues = $this->getRequest()->getQueryData('id');
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        if($findQues){ 
            $productCollection = $productCollection->addFieldToFilter("product_id", $findQues);
        }
        return $productCollection->getData();
    }
}

?>