<?php

class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedActions = ['login'];

    protected $_userName = 'admin@gmail.com';
    protected $_password = '123';


    public function loginAction()
    {
        if (isset ($_POST['Submit'])) {
            $data = $this->getRequest()->getParams("admin");
            if ($this->_userName == $data['admin_email'] && $this->_password == $data['password']) {

                Mage::getSingleton("core/session")->set("logged_in_admin_user_id", $this->_userName);
                // die();
                $this->setRedirect('admin/user/dashboard');
            } else {
                echo '<script>alert("Please Enter Valid Password")</script>';
                echo "<script>location.href='" . Mage::getBaseUrl() . 'catalog/admin_account/login' . "'</script>";

            }
        } else {
            $layout = $this->getLayout();
            $layout->removeChild('admin_header')->removeChild('admin_sidebar');
            $this->includeCss('form.css');
            $child = $layout->getChild('content');
            $login = $layout->createBlock('catalog/admin_account_login');
            $child->addChild('login', $login);
            $layout->toHtml();
        }
    }
    public function dashboardAction()
    {
        $sessionId = Mage::getSingleton("core/session")->get("logged_in_admin_user_id");
        if ($sessionId) {
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $dashboard = $layout->createBlock('catalog/admin_account_dashboard');
            $child->addChild('login', $dashboard);
            $layout->toHtml();

        } else {
            $this->setRedirect('admin/user/login');
        }
    }
    public function logoutAction()
    {
        Mage::getSingleton("core/session")->remove("logged_in_admin_user_id");
        Mage::getSingleton("core/session")->remove("quote_id");
        $this->setRedirect('');
    }
}