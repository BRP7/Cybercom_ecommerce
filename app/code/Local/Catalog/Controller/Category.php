<?php 
class Catalog_Controller_Category extends Core_Controller_Front_Action {

    public function viewAction()
    {
        // $this->includeCss("views.css");
        $layout = $this->getLayout();
        $child = $layout->getchild('content');
        $categoryView = $layout->createBlock('catalog/category_view');
        $child->addChild('category_view',$categoryView);
        $layout->toHtml();
    }


    // public function viewAction()
    // {
    //     $this->setFormCss("view121");
    //     $layout = $this->getLayout();
    //     $child = $layout->getchild('content'); //core_block_layout
    //     $productForm = $layout->createBlock('catalog/admin_category_list');
    //     $child->addChild('list',$productForm);
    //     $layout->toHtml();
    // }
}
?>