<?php

class Sales_Block_Order_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("order/list.phtml");
    }
    public function orderIdd()
    {
        return Mage::getModel('sales/order')
        ->getCollection()
        ->addFieldToFilter('customer_id', Mage::getSingleton('core/session')->get('logged_in_customer_id'))
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
}
?>