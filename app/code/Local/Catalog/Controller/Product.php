<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action{

    public function viewAction()
    {
        $this->includeCss("product.css");
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); //core_block_layout
        $productView = $layout->createBlock('catalog/product_view');
        $child->addChild('product_view',$productView);
        $layout->toHtml();
    }
    public function contactAction()
    {
        $this->includeCss("contact.css");
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); //core_block_layout
        $contentView = $layout->createBlock('core/template')->setTemplate('page/contact.phtml');;
        $child->addChild('content',$contentView);
        $layout->toHtml();
    }
}