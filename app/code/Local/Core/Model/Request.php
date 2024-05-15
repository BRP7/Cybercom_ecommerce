<?php
class Core_Model_Request
{
    protected $_getControllerName;
    protected $_getModuleName;
    protected $_getActionName;

    public function __construct()
    {
        $uri = $this->getRequestUrl();
        $arr = array_filter(explode("/", $uri));  
        $this->_getModuleName = isset($arr[0]) ? $arr[0] : "page";
        $this->_getControllerName = isset($arr[1]) ? $arr[1] : "index";
        $this->_getActionName = isset($arr[2]) ? $arr[2] : "index";

    }
    public function getParams($key = '', $arg=null)
    {
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ((!is_null($arg)) ? $arg : '')
            );
    }
    public function getPostData($key = '')
    {
        return ($key == '')
            ? $_POST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : '');
    }
    public function getQueryData($key = '')
    {
        return ($key == '')
            ? $_GET
            : (isset($_GET[$key])
                ? $_GET[$key]
                : '');
    }
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }
    public function getRequestUrl()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_uri = str_replace('/cybercom/MVC/', "", $request_uri);
        if (strpos($request_uri, '?') !== false)
			$request_uri = stristr($request_uri, '?', True);
        return $request_uri;
    }

    public function getControllerName()
    {
        return $this->_getControllerName;
    }
    public function getModuleName()
    {
        return $this->_getModuleName;
    }
    public function getActionName()
    {
        return $this->_getActionName;
    }

    public function getFullControllerClass()
    {
        $classname = $this->_getModuleName.'_Controller_'.$this->_getControllerName;
        $classname= ucwords($classname,"_");
        return $classname;
    }
}
?>