<?php

class Catalog_Block_Admin_Product_List extends Core_Block_Template{
    public function __construct(){
          $this->setTemplate("catalog/admin/product/list.phtml");
    }
    public function showList() {
        return Mage::getModel('catalog/product')->getCollection()->getData();
    }
    public function getCategory(){
        return Mage::getModel('catalog/category')->getCategoryIdName();
    }
    public function getSelectedCategory($product){
        return Mage::getModel('catalog/category')->getCategoryNameById($this->getCategory(), $product);
    }
}

?>