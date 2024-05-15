<?php

class Order_Block_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("order/list.phtml");
    }
    public function getCustomerData(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        return Mage::getModel("sales/order_customer")->getCollection()->addFieldToFilter("customer_id", $customerId )->getData();
    }
    public function getItemList($orderId){
        return Mage::getModel("sales/order_item")->getCollection()->addFieldToFilter("order_Id", $orderId )->getData();
    }
}
?>