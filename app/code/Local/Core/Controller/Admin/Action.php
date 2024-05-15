<?php
class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];
    public function __construct(){
        $_layout = $this->getLayout();
        $this->init();  
        $this->includeCss('dashboard.css');
        $this->includeCss('bootstrap.min.css');
        $this->includeCss('styles.css');
        $this->includeCss('styles.scss');
        $this->includeCss('tiny-slider.css');
        $this->includeJs('bootstrap.bundle.min.js');
        $this->includeJs('tiny-slider.js');
        $this->includeJs('custom.js');
    }
    public function init()
    {
        $this->getLayout()->setTemplate("core/admin.phtml");
        $this->getRequest()->getActionName();

        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedActions) &&
            !Mage::getSingleton('core/session')->get("logged_in_admin_user_id")
        ) {
            $this->setRedirect('admin/user/login');
            exit();
        }
        return $this;

    }


}
?>