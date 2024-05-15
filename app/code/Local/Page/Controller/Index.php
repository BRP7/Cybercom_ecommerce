<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $banner= $layout->createBlock('banner/banner');                          
        $layout->getChild('content')
        ->addChild('banner',$banner);
        $layout->toHtml();
    }
    public function aboutAction(){
        $layout = $this->getLayout();
        $this->includeCss('about.css');
        $child = $layout->getChild('content');
        $about = $layout->createBlock('core/template')->setTemplate('page/about.phtml');
        $child->addChild('about', $about);
        $layout->toHtml();

    }
    public function leadershipAction(){
        $layout = $this->getLayout();
        $this->includeCss('leadership.css');
        $child = $layout->getChild('content');
        $leadership = $layout->createBlock('core/template')->setTemplate('page/leadership.phtml');
        $child->addChild('leadership', $leadership);
        $layout->toHtml();

    }
    public function teamAction(){
        $layout = $this->getLayout();
        $this->includeCss('leadership.css');
        $child = $layout->getChild('content');
        $leadership = $layout->createBlock('core/template')->setTemplate('page/team.phtml');
        $child->addChild('leadership', $leadership);
        $layout->toHtml();

    }
    public function privacyAction(){
        $layout = $this->getLayout();
        $this->includeCss('leadership.css');
        $child = $layout->getChild('content');
        $leadership = $layout->createBlock('core/template')->setTemplate('page/privacy.phtml');
        $child->addChild('leadership', $leadership);
        $layout->toHtml();

    }
}