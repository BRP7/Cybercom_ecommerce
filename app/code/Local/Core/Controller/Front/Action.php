<?php
class Core_Controller_Front_Action
{
    protected $_layout = null;
    public function __construct()
    {
        Mage::getSingleton("core/session");
        $this->init();
        $_layout = $this->getLayout();
        $this->includeCss('bootstrap.min.css');
        $this->includeCss('styles.css');
        $this->includeCss('styles.scss');
        $this->includeCss('tiny-slider.css');
        $this->includeJs('bootstrap.bundle.min.js');
        $this->includeJs('tiny-slider.js');
        $this->includeJs('custom.js');
    }
    public function init(){
        return $this;
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
    public function includeCss($file = null)
    {
        if (!is_null($file)) {
            $this->_layout->getChild('head')->addCss($file);
        }
    }

    public function includeJs($file = null)
    {   
        if (!is_null($file)) {
            $this->_layout->getChild('head')->addJs($file);
        }
    }

    public function setRedirect($url){
        $url = Mage::getBaseUrla().$url;
        header('Location: '.$url);
    }
}