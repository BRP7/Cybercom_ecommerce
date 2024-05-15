<?php

class Agentbranch_Block_Index extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('agentbranch/index.phtml');
    }
    public function getParentData()
    {
        return Mage::getModel('agentbranch/agent')->getCollection()->getData();
    }

    public function getCHildData($agentId)
    {
        return Mage::getModel('agentbranch/branch')->getCollection()->addFieldToFilter("agent_id", $agentId)->addFieldToFilter("name", "Every 5 minutes")->getData();
    }

}

?>