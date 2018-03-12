<?php
namespace app\models;
 
use Yii;
 
class Stu1 extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'stu1';
    }
    public function rules()
    {
        return [
            [['Sdivision', 'Sdivisionname', 'Ssourcetype'], 'required']
        ];
    }   
}
?>