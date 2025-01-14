<?php

class Catalog_Block_Admin_Product_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/admin/product/form.phtml');
    }
    public function getProduct(){
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id', 0));
    }
    public function getCategory(){
        return Mage::getModel('catalog/category')->getCategoryIdName();
    }
    public function getSelectedCategory(){
        return Mage::getModel('catalog/category')->getCategoryNameById($this->getCategory(), $this->getProduct());
    }
}

?>