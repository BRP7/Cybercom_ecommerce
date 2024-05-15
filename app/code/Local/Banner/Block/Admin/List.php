<?php

class Banner_Block_Admin_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("banner/admin/list.phtml");
    }
    public function getBannerCollection(){
        return Mage::getModel("banner/banner")->getCollection()->getData();
    }

}
?>