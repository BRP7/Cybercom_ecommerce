<?php

class Tempconverter_Block_Admin_Form extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate("tempconverter/admin/form.phtml");
    }

    public function getTempconverter(){  
        return Mage::getModel('tempconverter/tempconverter')->load($this->getRequest()->getParams('id',0));
    }
    public function session(){
        $session = Mage::getSingleton('core/session')->getId();
        echo $session;
    }
    public function getUser(){
        $session = Mage::getSingleton('core/session')->get('user_name');
        echo $session;
    }
    

}