<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{
    protected $_allowedActions = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $this->includeCss('form.css');
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $categoryData = $this->getRequest()->getParams('catalog_category');
        $result = Mage::getModel('catalog/category')
            ->setData($categoryData)
            ->save();

        if ($categoryData['category_id']) {
            if ($result) {
                echo '<script>alert("Data Update successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            } else {
                echo '<script>alert("Dofa Code Ma Locha Chhe")</script>';
            }
        } else {
            if ($result) {
                echo '<script>alert("Data Insert successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            } else {
                echo '<script>alert("Dofa Code Ma Locha Chhe")</script>';
            }
        }
    }
    public function deleteAction()
    {
        $result = Mage::getModel('catalog/category')
            ->setId($this->getRequest()->getParams('id'))
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
        $this->includeCss('lists.css');
        $child = $layout->getChild('content');
        $categoryList = $layout->createBlock('catalog/admin_category_list');
        $child->addChild('list', $categoryList);
        $layout->toHtml();
    }
}