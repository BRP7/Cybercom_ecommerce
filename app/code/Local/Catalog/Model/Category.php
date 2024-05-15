<?php

class Catalog_Model_Category extends Core_Model_Abstract{
    public function init(){
        $this->_resourceClass = "Catalog_Model_Resource_Category";
        $this->_collectionClass = "Catalog_Model_Resource_Collection_Category";
    }
    public function getStatus(){
        $mapping = [
            1=>"Enabled",
            0=>"Disabled"
        ];
        if(isset($this->_data["status"])){
            return $mapping[$this->_data['status']];
        }
    }  
    
    public function getCategoryIdName()
    {
        $categoryCollection = $this->getCollection();
        $categorys = [];
        foreach ($categoryCollection->getData() as $category) {
            $categorys[$category->getCategoryId()] = $category->getCategoryName();
        }
        return $categorys;
    }
    public function getCategoryNameById($mapping, $product)
    {
        $productData = $product->getData();
        if (isset($productData['category_id'])) {
            return $mapping[$productData['category_id']];
        }
    }
}

?>