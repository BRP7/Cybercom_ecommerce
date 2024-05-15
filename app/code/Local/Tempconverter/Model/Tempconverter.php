<?php

class Tempconverter_Model_Tempconverter extends Core_Model_Abstract{
    public function init(){
        $this->_resourceClass = "Tempconverter_Model_Resource_Tempconverter";
        $this->_collectionClass = "Tempconverter_Model_Resource_Collection_Tempconverter";
    }
    
    public function temratureConverter($data){
        $userName = $data['user_name'];
        $tamp = $data['temprature'];
        $unit = $data['unit'];
        $convertUnit = $data['convert_unit'];
        if($unit == $convertUnit){
            $data['temprature'] = $tamp;
        }else{
            if($unit == 'Farenheit'){
                if($convertUnit == 'Celsius'){
                    $data['temprature'] = ((5/9)*$tamp - 32);
                }else{
                    $data['temprature'] = ((($tamp - 32)/1.8)+273.15);
                }
            }elseif($unit == 'Celsius'){
                if($convertUnit == 'Farenheit'){
                    $data['temprature'] = ($tamp*(9/5)) + 32;
                }else{
                    $data['temprature'] = $tamp + 273.15;
                }
            }else{
                if($convertUnit == 'Farenheit'){
                    $data['temprature'] = 1.8*($tamp-273) + 32;
                }else{
                    $data['temprature'] = $tamp - 273.15;
                }
            }
        }
        return $data;
    }
}

?>