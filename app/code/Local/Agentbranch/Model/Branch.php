<?php

class Agentbranch_Model_Branch extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Agentbranch_Model_Resource_Branch";
        $this->_collectionClass = "Agentbranch_Model_Resource_Collection_Branch";
    }
}

?>