<?php
class Page_Block_Header extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('page/header.phtml');
    }
    public function getCustomerId(){
        return Mage::getSingleton("core/session")->get("logged_in_customer_id");
    }
}