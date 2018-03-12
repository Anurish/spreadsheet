<?php
namespace app\models;
 
use Yii;
 
class Upload extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'Stu1';
    }
    public $file;
    
    public function rules()
    {
        return [
            [['file'], 'required'],
             [['file'], 'file']
        ];
    }   
}
?>