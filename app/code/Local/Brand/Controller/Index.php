<?php
class Brand_Controller_Index extends Core_Controller_Front_Action
{
   public function formAction()
   {
      $layout = $this->getLayout();
      $this->includeCss('form.css');
      $layout->removeChild('header')->removeChild('footer');
      $child = $layout->getchild('content');
      $form = $layout->createBlock('Brand/form');
      $child->addChild('form', $form);
      $layout->toHtml();
   }
   public function saveAction()
   {
      $data = $this->getRequest()->getParams('brand');
      $brand = Mage::getModel('brand/brand')->setData($data);
      $result = $brand->save();
      
      if ($data['brand_id']) {
         if ($result) {
            echo '<script>alert("Update Successful");</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/list' . "'</script>";
            
         } else {
            echo '<script>alert("Update Unsuccessful");</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/form' . "'</script>";
         }
      } else {
         if ($result) {
            echo '<script>alert("Insert Successful");</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/list' . "'</script>";
         } else {
            echo '<script>alert("Insert Unsuccessful");</script>';
            echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/form' . "'</script>";
         }
      }
   }
   public function listAction()
   {
      $layout = $this->getLayout();
      $this->includeCss('lists.css');
      $child = $layout->getchild('content');
      $list = $layout->createBlock('Brand/list');
      $child->addChild('list', $list);
      $layout->toHtml();
   }
   public function deleteAction(){
      $id = $this->getRequest()->getParams('id');
      $data = Mage::getModel('brand/brand')->load($id);
      $result = $data->delete();
      if ($result) {
         echo '<script>alert("Delated Successful");</script>';
         echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/list' . "'</script>";
      } else {
         echo '<script>alert("Delated Unsuccessful");</script>';
         echo "<script>location.href='" . Mage::getBaseUrl() . '/brand/index/list' . "'</script>";
      }
   }
}
?>