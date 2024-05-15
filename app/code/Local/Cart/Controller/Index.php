<?php

class Cart_Controller_Index extends Core_Controller_Front_Action
{
    public function cartAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getchild('content');
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        if ($quoteId) {
            $cart = $layout->createBlock('cart/cart');
            $child->addChild('cart', $cart);
        } else {
            $this->includeCss('emptycart.css');
            $emptyCart = $layout->createBlock('cart/Emptycart');
            $child->addChild('emptycart', $emptyCart);
        }
        $layout->toHtml();
    }
}

?>