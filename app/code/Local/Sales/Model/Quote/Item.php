<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    protected $_product = "";
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Item';
    }

    public function getProduct()
    {
        // echo 11;
        if($this->_product){
            return $this->_product;
        }
        // echo 22;
        $this->_product =  Mage::getModel('catalog/product')->load($this->getProductId());

        return $this->_product;
    }

    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        } else {
        }
    }

    public function addItem(Sales_Model_Quote $quote, $productId, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem()
        ;

        if ($item) {
            $qty = $qty + $item->getQty();
        }
        $this->setData(
            [
                'quote_id' => $quote->getId(),
                'product_id' => $productId,
                'qty' => $qty,
            ]
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();

        return $this;
    }
    public function updateItem($quoteId, $productId, $qty, $itemId)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('item_id', $itemId)
            ->addFieldToFilter('quote_id', $quoteId)
            ->addFieldToFilter('product_id', $productId)
            ->getFirstItem();
        $this->setData(
            [
                'quote_id' => $quoteId,
                'product_id' => $productId,
                'item_id' => $itemId,
                'qty' => $qty
            ]
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();

        return $this;
    }
    public function deleteItem($quoteId,$itemId)
    {
        $item = $this->getCollection()
        ->addFieldToFilter('quote_id', $quoteId)
        ->addFieldToFilter('item_id', $itemId)
        ->getFirstItem();
        
        if ($item) {
            $this->setId($item->getId());
        }

        $this->delete();

        $cartData = Mage::getBlock('cart/cart')->getItemList();
        
        if (empty($cartData)) {
            // echo 123;
            Mage::getSingleton('core/session')->remove('quote_id');
        }

        return $this;
    }
}