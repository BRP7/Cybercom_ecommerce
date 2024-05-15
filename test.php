<pre>
<?php
include "app/Mage.php";
include "app/code/Local/autoload.php";
$row = 0;
$path = Mage::getImagePath("import/test.csv");
// echo $path;
// die;
if (($handle = fopen($path, "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if (!$row) {
      $header = $data;
      $row++;
      continue;
    }
    $data1 = array_combine($header, $data);
    print_r($data1);
    $data1 = json_encode($data1);
    print_r($data1);
    die();
    Mage::getModel("import/import")->addData("data", $data1)->save();
    echo "<br>";
    $row++;
    // foreach ($tablecollection as $productData) {
    //   Mage::getModel("catalog/product")->setData($productData->getData())->save();
    // }        
    // $num = count($data);
    // echo "<p> $num fields in line $row: <br /></p>\n";
    // $row++;
    // for ($c=0; $c < $num; $c++) {
    //     echo $data[$c] . "<br />\n";
    // }

  }
  // echo $row;
  fclose($handle);
}
// foreach($data as $key => $val){
//     $dataString=json_encode($val);

//     print_r(json_decode($dataString,true));
//     die();


// }
?>