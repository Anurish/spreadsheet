<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
 <div class="alert alert-warning" style="text-align:center">
  <strong>Update Details..!</strong> 
</div>
<?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($edit, 'Sdivision'); ?>
    <?= $form->field($edit, 'Sdivisionname'); ?>
    <?= $form->field($edit, 'Ssourcetype'); ?>
    <?= $form->field($edit, 'Ssourcecode'); ?>
    <?= $form->field($edit, 'Ssourcename'); ?>
    <?= $form->field($edit, 'SlineBusiness'); ?>
    <?= $form->field($edit, 'Sproddesc'); ?>
    <?= $form->field($edit, 'DPOLL'); ?>
    <?= $form->field($edit, 'Sinsuredname'); ?>
    <?= $form->field($edit, 'GROSS'); ?>
    <?= $form->field($edit, 'Sdoi'); ?>
    <?= $form->field($edit, 'Sdoe'); ?>
    <?= $form->field($edit, 'TERRERISM'); ?>
    <?= $form->field($edit, 'ODTOTAL'); ?>
    <?= $form->field($edit, 'TP_TOTAL'); ?>
    <?= $form->field($edit, 'PREMIUMFORCOMM'); ?>
    <?= $form->field($edit, 'Sbusinesstype'); ?>
    <?= $form->field($edit, 'COMM'); ?>
    <?= $form->field($edit, 'COMMM'); ?>
     <?= $form->field($edit, 'Smonth'); ?>
     <?= $form->field($edit, 'SANDALONETPPOLICY'); ?>
     <?= $form->field($edit, 'REMARK'); ?>
    <?= Html::submitButton('update', ['class' => 'btn btn-warning btn-block', 'name' => 'update']) ?>

<?php ActiveForm::end(); ?>