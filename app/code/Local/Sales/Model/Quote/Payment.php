<?php

class Sales_Model_Quote_Payment extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Payment';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Payment';
    }
    public function _beforeSave(){
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->addData('quote_id',$quoteId);
    }
}

?>