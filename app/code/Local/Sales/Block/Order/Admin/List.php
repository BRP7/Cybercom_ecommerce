<?php

class Sales_Block_Order_Admin_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("order/admin/list.phtml");
    }
    public function getListCollection(){
        return Mage::getModel("sales/order_item")->getCollection();
    }
    public function orderIdd()
    {
        return Mage::getModel('sales/order')
        ->getCollection()
        ->getData();

    }
    public function items($orderId)
    {
        return Mage::getModel('sales/order_item')
        ->getCollection()
        ->addFieldToFilter('order_id', $orderId)
        ->getData();
        
    }

    public function product($Id)
    {
        return Mage::getModel('catalog/product')
        ->load($Id);
        
    }
    public function getHistory($orderId){
        return Mage::getModel("sales/order_history")->getCollection()->addFieldToFilter('order_id',$orderId)->addOrderBy('history_id',"DESC")->getFirstItem();
    }
}
?>