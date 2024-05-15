<?php
class Import_Model_Import extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Import_Model_Resource_Import";
        $this->_collectionClass = "Import_Model_Resource_Collection_Import";
    }
    public function saveFile($tmpName, $filePath)
    {
        move_uploaded_file($tmpName, $filePath);
    }
    public function saveTempData($filePath)
    {
        $row = 0;
        $header = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                if (!$row) {
                    $header = $data;
                    $row++;
                    continue;
                }

                $rowData = array_combine($header, $data);
                $rowData = json_encode($rowData);
                Mage::getModel("import/import")->addData("data", $rowData)->save();
                $row++;

            }
            echo $row;
            fclose($handle);
        }
    }
    public function saveData()
    {
        $importData = Mage::getModel('import/import')->getCollection()->getData();
        foreach ($importData as $data) {
            $productData = $data->getData();
            $product = json_decode($productData['data'],true);
            Mage::getModel("catalog/product")->setData($product)->save();
        }
    }
}