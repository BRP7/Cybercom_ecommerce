<?php

class Cart_Block_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getItemList()
    {
        $quoteId = Mage::getSingleton("core/session")->get('quote_id');
        return Mage::getModel('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', $quoteId);
    }
    public function getProductList($productId){
        return Mage::getModel('catalog/product')->getCollection()->addFieldToFilter('product_id', $productId);
    }
    public function getAddressData(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $addressData = Mage::getModel('customer/customer')->getCollection()->addFieldToFilter('customer_id', $customerId)->getData(); 
        return $addressData;
    }
}

?>