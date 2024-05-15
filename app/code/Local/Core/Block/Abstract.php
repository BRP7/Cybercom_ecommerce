<?php
class Core_Block_Abstract
{
    public $template;
    public function setTemplate($template)
    {
        // echo ("hello");
        // die;
        $this->template = $template;
        // var_dump($this->template);
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function __get($key)
    {
    }
    public function __unset($key)
    {
    }
    public function __set($key, $value)
    {
    }
    public function addData($key, $value)
    {
    }
    public function getData($key = null)
    {
    }
    public function setData($data)
    {
    }
    //public function getUrl($action = null, $controller = null, $params = [], $resetParams = false)
    public function getUrl($path)
    {
        return "http://localhost/cybercom/MVC/".$path;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
    public function render()
    {
        // echo $this->getTemplate();
        include Mage::getBaseDir('app') . '/design/frontend/template/' . $this->getTemplate();
    }
    

}