<?php

class Admin_Controller_Import_Import extends Core_Controller_Admin_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $import = $layout->createBlock('Import/admin_import');
        $child->addChild('import', $import);
        $layout->toHtml();
    }
    public function saveAction()
    {
        if (isset ($_FILES['file'])) {

            $fileName = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];
            $filePath = Mage::getBaseDir('media/import') . "/" . $fileName;

            Mage::getModel("import/import")->saveFile($tmpName, $filePath);

            Mage::getModel("import/import")->saveTempData($filePath);

            Mage::getModel("import/import")->saveData();
        }
    }
}

?>