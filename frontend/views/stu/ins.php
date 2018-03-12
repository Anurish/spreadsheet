<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>
  
<div class="alert alert-success" style="text-align:center">
  <strong>Add New Details..!</strong> 
</div>
<?php
 Modal::begin([
        'header'=>'<h4>Brokers</h4>',
        'id' => 'modal',
        'size' =>'modal-lg'
    ]);
 echo "<div id='modalContent'></div>";


 Modal::end();
 ?>
<?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'Sdivision'); ?>
    <?= $form->field($model, 'Sdivisionname'); ?>
    <?= $form->field($model, 'Ssourcetype'); ?>
    <?= $form->field($model, 'Ssourcecode'); ?>
    <?= $form->field($model, 'Ssourcename'); ?>
    <?= $form->field($model, 'SlineBusiness'); ?>
    <?= $form->field($model, 'Sproddesc'); ?>
    <?= $form->field($model, 'DPOLL'); ?>
    <?= $form->field($model, 'Sinsuredname'); ?>
    <?= $form->field($model, 'GROSS'); ?>
    <?= $form->field($model, 'Sdoi'); ?>
    <?= $form->field($model, 'Sdoe'); ?>
    <?= $form->field($model, 'TERRERISM'); ?>
    <?= $form->field($model, 'ODTOTAL'); ?>
    <?= $form->field($model, 'TP_TOTAL'); ?>
    <?= $form->field($model, 'PREMIUMFORCOMM'); ?>
    <?= $form->field($model, 'Sbusinesstype'); ?>
    <?= $form->field($model, 'COMM'); ?>
    <?= $form->field($model, 'COMMM'); ?>
    <?= $form->field($model, 'Smonth'); ?>
    <?= $form->field($model, 'SANDALONETPPOLICY'); ?>
    <?= $form->field($model, 'REMARK'); ?>
     
    <?= Html::submitButton('Add', ['class' => 'btn btn-success btn-block']); ?>
 
<?php ActiveForm::end(); ?>