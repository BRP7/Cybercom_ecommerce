<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowedActions = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $this->includeCss('form.css');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();

    }
    public function saveAction()
    {
        $productData = $this->getRequest()->getParams('catalog_product');
        // echo "<pre>"; 
        // print_r($productData);
        // die();
        $result = Mage::getModel('catalog/product')
            ->setData($productData)
            ->save();
        if ($productData['product_id']) {
            if ($result) {
                echo '<script>alert("Data Update successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            } else {
                echo '<script>alert("Dofa Code Ma Locha Chhe")</script>';
            }
        } else {
            if ($result) {
                echo '<script>alert("Data Insert successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            } else {
                echo '<script>alert("Dofa Code Ma Locha Chhe")</script>';
            }
        }
    }
    public function deleteAction()
    {
        $productId = $this->getRequest()->getParams('id');
        $result = Mage::getModel('catalog/product')->load($productId)
            ->delete();
        if ($result) {
            echo '<script>alert("Data Deleted successfully")</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
        } else {
            echo '<script>alert("Dofa Code Ma Locha Chhe")</script>';
        }
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $this->includeCss('lists.css');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}
?>