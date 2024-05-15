<?php

class Mage
{
    private static $baseDir = "C:/xampp/htdocs/cybercom/MVC"; 
    private static $baseUrl = "http://localhost/cybercom/MVC"; 
    private static $_singleTon = NULL; 
    public static function init()
    {
        $forntController = new Core_Controller_Front();
        $forntController->init();
    }
    public static function getSingleton($className)
    {
        if(isset(self::$_singleTon[$className])){
            return  self::$_singleTon[$className]; 

        }
        else{

            return self::$_singleTon[$className] = self::getModel($className); 
        }
    }
    public static function getModel($className)
    {
        $className = str_replace('/','_Model_', $className);
        $className = ucwords($className,"_");
        return new $className;
    }
    public static function getBlock($className)
    {
        $className = str_replace('/','_Block_', $className);
        $className = ucwords($className,'_');
        return new $className;
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getImagesUrl($images){
        return self::$baseUrl."/Skin/Images/".$images;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . '/Skin/' . $subUrl;
        }
        return self::$baseUrl;
    }
    public static function getBaseUrla($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . '/' . $subUrl;
        }
        return self::$baseUrl ."/";
    }
    public static function getBaseDir($subDir = null)
    {
        if($subDir){
            return self::$baseDir."/".$subDir;
        } 
            return self::$baseDir;
    }
    public static function getImagePath($filePath){
        if($filePath){
           return self::$baseUrl.'/media/' . $filePath;
        }
        
     }
}