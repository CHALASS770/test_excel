<?php
/* recuperer mes librairries pour excel avec composer*/
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
/*
Creation dun nouveau fichier  excel
*/
$value1 = [["client","prix","ZipCode"],["client 1","$ 190", 123456],["client 2","$ 2590", 987654]];
$value2 = [["client","prix","ZipCode"],["client 2","$ 2590", 987654],["client 1","$ 190", 123456]];
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->fromArray($value1, NULL, 'A1'); 
//$sheet->setCellValue('A1',$value1);
// Create a new worksheet called "My Data"
$myWorkSheet = new Worksheet($spreadsheet, 'My Data2');

// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$spreadsheet->addSheet($myWorkSheet);
$sheet = $spreadsheet->getSheet(1);
$sheet->fromArray($value2, NULL, 'A1'); 


$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

?>