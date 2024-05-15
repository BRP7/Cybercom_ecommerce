<?php

class Admin_Controller_Tempconverter_Index extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $this->includeCss('form.css');
        $child = $layout->getChild('content');
        $form = $layout->createBlock('tempconverter/admin_form');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {

        $data = $this->getRequest()->getparams("tempconverter");
        $data = Mage::getModel('tempconverter/tempconverter')->temratureConverter($data);
        Mage::getSingleton("core/session")->set("user_name", $data['user_name']);
       
        $tempcon = Mage::getModel('tempconverter/tempconverter')
            ->setData($data);
        $result = $tempcon->save();
        if ($data['id']) {
            if ($result) {
                echo '<script>alert("Data updated successfully")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/tempconverter_index/list' . "'</script>";
            }
        } else {
            echo '<script>alert("Data inserted successfully")</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/tempconverter_index/list' . "'</script>";
        }

    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $tempconverter = Mage::getModel("tempconverter/tempconverter")->load($id);
        $result = $tempconverter->delete();
        if ($result){
            echo "<script>alert('data deleted sucessfully')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/tempconverter_index/list' . "'</script>";
        }

    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $this->includeCss('lists.css');
        $child = $layout->getChild('content');
        $list = $layout->createBlock('tempconverter/admin_list');
        $child->addChild('list', $list);
        $layout->toHtml();
    }
}



?>