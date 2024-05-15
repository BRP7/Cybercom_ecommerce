<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }

    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData([
                    'tax_percent' => 8,
                    'grand_total' => 0,
                ]);
            if (!is_null($this->getQuoteCollection())) {
                print_r($this->getQuoteCollection());
                $quoteId = $this->getQuoteCollection()->getQuoteId();
                $quote->addData('quote_id', $quoteId);
            }
            $quote->save();
            Mage::getSingleton('core/session')
                ->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        } else {
            if ($customerId) {
                $quoteModel = Mage::getModel('sales/quote')->load($quoteId);
                $quoteModel->addData('customer_id', $customerId)->save();
                $quoteId = $quoteModel->getId();
            }
            $this->load($quoteId);
        }
        return $this;
    }

    public function getQuoteCollection()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        if ($customerId) {
            return Mage::getSingleton('sales/quote')
                ->getCollection()
                ->addFieldToFilter('customer_id', $customerId)
                ->addFieldToFilter('order_id', 0)
                ->getFirstItem();
        } else {
            return null;
        }
    }

    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }

    protected function _beforeSave()
    {
        $grandTotal = 0;

        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }

    public function addProduct($request)
    {
        // var_dump(debug_backtrace());
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->addItem($this, $request['product_id'], $request['qty']);
        }
        $this->save();
    }
    public function updateProduct($request)
    {
        // var_dump(debug_backtrace());
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->updateItem($request['quote_id'], $request['product_id'], $request['qty'], $request['item_id']);
        }
        $this->save();
    }
    public function deleteProduct($request)
    {
        // var_dump(debug_backtrace());
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->deleteItem($request['quote_id'], $request['item_id']);
        }
        $this->save();
    }
    public function saveAddress($address)
    {
        $this->initQuote();
        if ($this->getId()) {
            $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
            $addressData = Mage::getModel('customer/customer')->getCollection()->addFieldToFilter('customer_id', $customerId)->getData();
            $email = "";
            foreach ($addressData as $addValue) {
                $email = $addValue->getCustomerEmail();
            }
            Mage::getModel('sales/quote_customer')
                ->setData($address)
                ->addData('quote_id', $this->getId())
                ->addData('customer_id', $customerId)
                ->addData('email', $email)
                ->save();
        }
    }
    public function savePayment($payment)
    {
        $this->initQuote();
        if ($this->getId()) {
            return Mage::getModel('sales/quote_payment')
                ->setData($payment)
                ->addData('quote_id', $this->getId())
                ->save();
        }
    }

    public function saveShipping($shipping)
    {
        $this->initQuote();
        if ($this->getId()) {
            return Mage::getModel('sales/quote_shipping')
                ->setData($shipping)
                ->addData('quote_id', $this->getId())
                ->save();
        }
    }
    public function getConvertQuoteToOrder()
    {
        $this->initQuote();
        if ($this->getId()) {
            $order = $this->convertQuoteToOrder();
            $orderId = $order->getId();
            $this->statusHistory($orderId);
            $address = $this->convertQuoteAddToOrderAdd($orderId);
            $item = $this->convertItemCollection($orderId);
            $payment = $this->convertPayment($orderId);
            $shipping = $this->convertShipping($orderId);
            $product = $this->productStock();
            $this->addData('order_id', $order->getId())->save();
            $this->addData('payment_id', $payment->getId())->save();
            $this->addData('shipping_id', $shipping->getId())->save();
        }
    }
    public function statusHistory($orderId)
    {
        date_default_timezone_set('Asia/Kolkata');
        $submission_date = date("Y-m-d H:i:s");
        return Mage::getModel('sales/order_history')
            ->setData($this->getData())
            ->addData('order_id',"$orderId")
            ->addData('from_status',"pending")
            ->addData('to_status',"pending")
            ->addData('date',$submission_date)
            ->addData('action_by',"customer")
            ->removeData('quote_id')
            ->removeData('tax_percent')
            ->removeData('grand_total')
            ->removeData('customer_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->save();

    }
    public function convertQuoteToOrder()
    {
        date_default_timezone_set('Asia/Kolkata');
        $submission_date = date("Y-m-d H:i:s");
        return Mage::getModel('sales/order')
            ->setData($this->getData())
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->addData('status',"pending")
            ->addData('date',$submission_date)
            ->save();

    }
    public function convertQuoteAddToOrderAdd($orderId)
    {

        if ($this->getId()) {

            $data = Mage::getModel('sales/quote_customer')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            return Mage::getModel('sales/order_customer')
                ->setData($data->getData())
                ->removeData('quote_customer_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }
    public function convertItemCollection($orderId)
    {
        foreach ($this->getItemCollection()->getData() as $_item) {
            Mage::getModel('sales/order_item')
                ->setData($_item->getData())
                ->removeData('item_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
        return $this;
    }

    public function productStock()
    {
        foreach ($this->getItemCollection()->getData() as $_item) {
            $data = Mage::getModel('catalog/product')
                ->getCollection()
                ->addFieldToFilter('product_id', $_item->getProductId());
            foreach ($data->getData() as $product) {
                $stock =  $product->getStock() - $_item->getQty();
                Mage::getModel('catalog/product')
                    ->setData($product->getData())
                    ->removeData('customer_id')
                    ->addData('stock', $stock)
                    ->save();
            }
        }
        return $this;
    }
    public function convertPayment($orderId)
    {
        if ($this->getId()) {
            $data = Mage::getModel('sales/quote_payment')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            return Mage::getModel('sales/order_payment')
                ->setData($data->getData())
                ->removeData('payment_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }

    public function convertShipping($orderId)
    {
        if ($this->getId()) {
            $data = Mage::getModel('sales/quote_shipping')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            return Mage::getModel('sales/order_shipping')
                ->setData($data->getData())
                ->removeData('shipping_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }

}