<?php

class Sales_Model_Quote_Customer extends Core_Model_Abstract
{

    public function init()
    {
    $this->_resourceClass = 'Sales_Model_Resource_Quote_Customer';
    $this->_collectionClass = 'sales_Model_Resource_Collection_Quote_Customer';
    }
    public function _beforeSave(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->addData('customer_id',$customerId)
        ->addData('quote_id',$quoteId);
    }
}