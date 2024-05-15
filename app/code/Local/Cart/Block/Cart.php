<?php

class Cart_Block_Cart extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/cart.phtml');
    }
    public function getItemList()
    {
            $quoteId = Mage::getSingleton("core/session")->get('quote_id');
            return Mage::getModel('sales/quote_item')
                ->getCollection()
                ->addFieldToFilter('quote_id', $quoteId)
                ->getData();
    }
    public function getProductList($productId)
    {
        return Mage::getModel('catalog/product')->getCollection()->addFieldToFilter('product_id', $productId)->getData();
    }
}