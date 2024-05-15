<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action
{

    protected $_allowedActions = [];

    public function formAction()
    {
        $this->includeCss('form.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('banner/admin_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }


    public function saveAction()
    {
        $data = $this->getRequest()->getparams("banner");
        $product = Mage::getModel('banner/banner')
            ->setData($data);
        $result = $product->save();
        if ($data['banner_id']) {
            if ($result) {
                echo '<script>alert("Data updated successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/banner/list' . "'</script>";
            }
        } else {
            echo '<script>alert("Data inserted successfully")</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/banner/list' . "'</script>";
        }

    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $product = Mage::getModel("banner/banner")->load($id);
        $result = $product->delete();
        if ($result) {
            echo "<script>alert('data deleted sucessfully')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/banner/list' . "'</script>";
        }

    }

    public function listAction()
    {
        $this->includeJs('jquery-3.7.1.js');
        $layout = $this->getLayout();
        $this->includeCss('lists.css');
        $child = $layout->getchild('content');
        $productForm = $layout->createBlock('banner/admin_list');
        $child->addchild('list', $productForm);
        $layout->toHtml();
    }
    public function bannerAction()
    {
        header('Content-Type: application/json');
        $data = Mage::getModel("banner/banner")->getBannerData(); 
        print_r (json_encode($data));
    }
}