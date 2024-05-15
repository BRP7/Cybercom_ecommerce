<?php

class Banner_Block_Banner extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('banner/banner.phtml');
    }
    public function getBanner()
    {
        $banner = Mage::getModel("banner/banner")->getCollection();
        $imageList = [];
        foreach ($banner->getData() as $value) {
            $imageList[] = $value->getBannerImage();
        }
        return $imageList[0];
    }
    public function getProductData(){
        $productData = Mage::getModel('catalog/product')->getCollection()->addFieldToFilter("product_id", ['in'=>[1,2,3]])->getData();
        return $productData;
    }
}

?>