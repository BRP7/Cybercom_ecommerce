<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_loginRequiredActions = [];

    public function init()
    {
        // $action = $this->getRequest()->getActionName();
        // echo (in_array($action, $this->_loginRequiredActions));
        // if( in_array($action, $this->_loginRequiredActions) ) {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        if (!$customerId) {
            $quoteId = Mage::getSingleton("core/session")->get('quote_id');
            Mage::getSingleton("core/session")->set("checkout", $quoteId);
            $this->setRedirect('customer/account/login');
            exit();
        }
        // }
    }
    public function indexAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $layout = $this->getLayout();
        $child = $layout->getchild('content');
        if (!is_null($quoteId) && !empty($quoteId)) {
            $this->includeJs('jquery-3.7.1.js');
            $checkout = $layout->createBlock('cart/checkout');
            $child->addChild('checkout', $checkout);
        } else {
            $cart = $layout->createBlock('cart/cart');
            $child->addChild('cart', $cart);
        }
        $layout->toHtml();
    }
    
}


?>