<?php
namespace frontend\controllers;
use Yii;
use app\models\Stu1;
use app\models\Upload;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\data\Pagination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use yii\data\SqlDataProvider;
use yii\db\Query;




class StuController extends Controller
{  
	 public function actionIndex()
    {
       // echo "ok";
        $stu = Stu1::find();

        $pagination = new Pagination([
        'defaultPageSize' => 2,
        'totalCount' => $stu->count(),
]);

      $model = $stu->orderBy('Sdivision')
      ->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();


     return $this->render('index', [
    'model' => $model,
    'pagination' => $pagination,
    ]);

        //echo print_r($stu);         
       // return $this->render('index', ['model' => $stu]);
    }

    public function actionInsert()
    {
        $model = new Stu1();
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
             return $this->redirect(['index']);
        }
		return $this->renderAjax('ins', ['model' => $model]);
    }

    public function actionEdit($id)
    {
        //echo "Edit.. id=".$id;
        $edit = Stu1::find()->where(['id' => $id])->one();
  		//print_r($edit);
  		if($edit->load(Yii::$app->request->post()) && $edit->save()){
            return $this->redirect(['index']);
        }
  		return $this->render('edit', ['edit' => $edit]);

    }

    public function actionDel($id)
    {
     //   echo "Del.. id=".$id;
        $model = Stu1::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }



    
    public function actionArray()
    {

        $model=new Upload();



        // if(isset($_FILES['file']) && $_FILES['file']['error'] == 0 && $_FILES['file']['size']>0 ){


        //   $UploadedFile = UploadedFile::getInstanceByNmae('file');
        //   $path = 'uploads/'.time().'_'.$uploadedFile->name;
        //   FileHelper::createDirectory('uploads/',0777);
        //   $test = $uploadedFile->saveAs($path);
        //   $citylist = \moonland\phpexcel\Excel::import($path);
        //   $model->importcitycode($citylist);

  

        // }


   if(Yii::$app->request->isPost)
        {
            $model->file= UploadedFile::getInstance($model,'file');

            if($model->file && $model->validate())
            {
                if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension))
                {

    
                echo '<div class ="alert alert-info" style="text-align:center;margin-top:50px">
                <strong>excel file has been uploaded</strong>
                </div>';
               
               $inputFile='upload/'.$model->file->basename.".".$model->file->extension;
        
             //  $data = \moonland\phpexcel\Excel::import($inputFile); // $config is an optional

             //  $data = \moonland\phpexcel\Excel::widget([
             //      'mode' => 'import', 
             //      'fileName' => $inputFile, 
             //      'setFirstRecordAsKeys' => true, 
             //      'setIndexSheetByName' => true,  
             //     'getOnlySheet' => 'sheet1', 
             // ]);
             // echo '<pre>'; print_r($data);die;

         

               $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
               $reader->setReadDataOnly(TRUE);
               $spreadsheet = $reader->load($inputFile);
               $worksheet = $spreadsheet->getActiveSheet();
               $csv = array_map('str_getcsv', file($inputFile));
               array_walk($csv, function(&$a) use ($csv) {
               $a = array_combine($csv[0], $a);
               });
               array_shift($csv);
               echo '<pre>'; print_r($csv);die;

               // $rows = [];
//                foreach ($worksheet->getRowIterator() AS $row) {
//                $cellIterator = $row->getCellIterator();
//                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
//                $cells = [];
//                foreach ($cellIterator as $cell) {
//                $cells[] = $cell->getValue();
//             }
//     $rows[] = $cells;

// }

 // echo '<pre>';print_r($rows);die;







  













     
    

           


        

           
        
    

     
  
}
}
}
return $this->render('upload', ['model' => $model]);
}










  public function actionExcel()
    {
        $model=new Upload();
   if(Yii::$app->request->isPost)
        {
            $model->file= UploadedFile::getInstance($model,'file');

            if($model->file && $model->validate())
            {
                if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension))
                {

    
                echo '<div class ="alert alert-info" style="text-align:center;margin-top:50px">
                <strong>excel file has been uploaded</strong>
                </div>';
               

    $inputFile='upload/'.$model->file->basename.".".$model->file->extension;

               $k=date('d-m-y_h:m:s');            
                  echo $outputFile='upload/'.$k.'_data.csv';
               
                   $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFile);
                   $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType);
                 
        
 
                   $objReader->setReadDataOnly(true);   
                   $objPHPExcel = $objReader->load($inputFile);    
 
                   $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Csv');
                   $objWriter->save($outputFile);
}
}
}
return $this->render('upload', ['model' => $model]);
}

























    public function actionUpload()
    {
    	$model=new Upload();
    	if(Yii::$app->request->isPost)
    	{
    		$model->file= UploadedFile::getInstance($model,'file');
    		if($model->file && $model->validate())
    		{
    			if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension))
    			{

    
					$inputFile='upload/'.$model->file->basename.'.'.$model->file->extension;
    	
    

            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($inputFile);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet->getRowIterator();
            $worksheet->getColumnIterator();
            $highestRow = $worksheet->getHighestRow(); // e.g. 10
            $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
      
         
            for($row=1;$row <=$highestRow; $row++  )
        {
            $rowData=$worksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            if($row == 1)
            {
                continue;
            }
            $stu=new Stu1();
            foreach($rowData as $value){
            if($value!=""){
            
            $stu->Sdivision=$value[0]; 
            $stu->Sdivisionname=$value[1]; 
            $stu->Ssourcetype=$value[2]; 
            $stu->Ssourcecode=$value[3]; 
            $stu->Ssourcename=$value[4]; 
            $stu->SlineBusiness=$value[5]; 
            $stu->Sproddesc=$value[6]; 
            $stu->DPOLL=$value[7]; 
            $stu->Sinsuredname=$value[8]; 
            $stu->GROSS=$value[9]; 
            $stu->Sdoi=$value[10]; 
            $stu->Sdoe=$value[11]; 
            $stu->TERRERISM=$value[12]; 
            $stu->ODTOTAL=$value[13]; 
            $stu->TP_TOTAL=$value[14]; 
            $stu->PREMIUMFORCOMM=$value[15]; 
            $stu->Sbusinesstype=$value[16]; 
            $stu->COMM=$value[17]; 
            $stu->COMMM=$value[18]; 
            $stu->Smonth=$value[19]; 
            $stu->SANDALONETPPOLICY=$value[20]; 
            $stu->save();   
        }
    }
            
           }

    return $this->redirect(['index']);  
        }



        

           
    	
    
    			}

    		}
            return $this->render('upload', ['model' => $model]);
    	}
    	
    
} 

 ?>