<?php

class Order_Block_Admin_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("order/admin/item.phtml");
    }
    // public function getListCollection(){
    //     return Mage::getModel("sales/order_item")->getCollection();
    // }
    
}
?>