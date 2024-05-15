<?php

class Agentbranch_Model_Agent extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Agentbranch_Model_Resource_Agent";
        $this->_collectionClass = "Agentbranch_Model_Resource_Collection_Agent";
    }
}

?>