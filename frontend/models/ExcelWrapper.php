<?php 

class ExcelWrapper {
	

	public function import($filepath){

		  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
               $reader->setReadDataOnly(TRUE);
               $spreadsheet = $reader->load($inputFile);
               $worksheet = $spreadsheet->getActiveSheet();
               $csv = array_map('str_getcsv', file($inputFile));
               array_walk($csv, function(&$a) use ($csv) {
               $a = array_combine($csv[0], $a);
               });
               array_shift($csv);
               return $csv;
               echo '<pre>'; print_r($csv);die;

	}
}

?>