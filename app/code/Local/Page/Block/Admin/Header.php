<?php
class Page_Block_Admin_Header extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('page/admin/header.phtml');
    }
    public function getCustomerId(){
        return Mage::getSingleton("core/session")->get("logged_in_customer_id");
    }
}