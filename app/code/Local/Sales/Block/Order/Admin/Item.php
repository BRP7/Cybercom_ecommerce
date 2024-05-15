<?php

class Sales_Block_Order_Admin_Item extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("order/admin/item.phtml");
    }
    public function items()
    {
        $orderId = $this->getRequest()->getParams('id');
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

    public function getAddressData(){
        $orderId = $this->getRequest()->getParams('id');
        return Mage::getModel('sales/order_customer')->getCollection()->addFieldToFilter('order_id', $orderId)->getData(); 
    }
    public function getCustomerData($customerId){
        return Mage::getModel('customer/customer')->getCollection()->addFieldToFilter('customer_id', $customerId)->getData(); 
    }
}

?>