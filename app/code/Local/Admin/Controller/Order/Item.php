<?php

class Admin_Controller_Order_Item extends Core_Controller_Admin_Action
{
    public function listAction(){
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); 
        $orderItemList = $layout->createBlock('sales/order_admin_item');
        $child->addchild('item_list', $orderItemList);
        $layout->toHtml();
    }
}

?>