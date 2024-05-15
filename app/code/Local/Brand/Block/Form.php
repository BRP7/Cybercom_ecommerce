<?php

class Brand_Block_form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('brand/form.phtml');
    }
    public function getBrand(){
        return Mage::getModel("brand/brand")->load($this->getRequest()->getParams('id',0));
    }
}

?>