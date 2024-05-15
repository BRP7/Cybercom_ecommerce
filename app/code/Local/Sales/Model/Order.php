<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }
    protected function _beforeSave()
    {
        $arr = $this->getData();
        if (!array_key_exists("order_id",$arr)){
        $orderNumber = $this->getLastOrderNumber();
        $this->addData('order_number', $orderNumber);
       }
    }
    public function getLastOrderNumber()
    {
        $order = Mage::getModel("sales/order")->getCollection()->addOrderBy('order_id', "DESC")->getFirstItem();
        if(!is_null($order)){
            $n = $order->getOrderNumber();
            $n = substr($n, 4);
        }else{
            $n=1000;
        }

        return "CCC-" . ($n + 1);
    }
}