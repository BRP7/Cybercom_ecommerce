<?php

class Banner_Model_Banner extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = "Banner_Model_Resource_Banner";
        $this->_collectionClass = "Banner_Model_Resource_Collection_Banner";
    }
    public function getStatus(){
        $mapping = [
            1=>"Enabled",
            0=>"Disabled"
        ];
        if(isset($this->_data["status"])){
            return $mapping[$this->_data['status']];
        }
    } 
    public function getBannerData(){
        $data = $this->getCollection()->getData();
        $formattedData = array();
        $i = 0 ;
        foreach ($data as $item) {
                $formattedData[$i] = ['banner_id' => $item->getBannerId(), "banner_image" => $item->getBannerImage(), "status" => $item->getStatus(), "show_on" => $item->getShowOn()];
                $i++;
        }
        return $formattedData;
    }
}