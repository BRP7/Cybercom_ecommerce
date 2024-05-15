<?php

class Admin_Controller_Order_History extends Core_Controller_Admin_Action
{
    public function listAction(){
        $this->includeCss("lists.css");  
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); 
        $orderList = $layout->createBlock('sales/order_admin_list');
        $child->addchild('list', $orderList);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getparams("history");
        Mage::getModel('sales/order_history')->saveHistory($data);
        $this->setRedirect("admin/order_history/list");
        // $this->setRedirect("");
    }
    public function rejectedAction()
    {
        $data = $this->getRequest()->getparams("history");
        Mage::getModel("sales/order_history")->rejectedHistory($data);
        $this->setRedirect("admin/order_history/list");
    }
}

?>