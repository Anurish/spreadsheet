<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm; 

?>
 
<style>
table th,td{
    padding: 10px;
}
</style>
<script>


</script> 

<div class="alert alert-info" style="text-align:center">
  <strong>Brokers Details..!</strong> 
</div>
 <?= Html::button('Add new details', [ 'value'=>Url::to('index.php?r=stu/insert'), 'class' => 'btn btn-info','id'=>'modalButton']);?>

  <?php
    Modal::Begin([
            'header'=>'',
            'id'=>'modal',
            'size'=>'modal-lg'
        ]);
    echo "<div id='modalContent'></div> ";
    Modal::end();
 ?>
 <?= Html::a('Add Excel file', ['stu/upload'], ['class' => 'btn btn-info']); ?>
 <?= Html::a('Convert excel to array', ['stu/array'], ['class' => 'btn btn-success']); ?>
 <?= Html::a('Convert excel to csv', ['stu/excel'], ['class' => 'btn btn-success']); ?>

 

 
<table border="1" class="table table-striped" style="margin-top:15px">
    <tr>
        <th>Sdivision</th>
        <th>Sdivisionname</th>
        <th>Ssourcetype</th>
        <th>Ssourcecode</th>
        <th>Ssourcename</th>
        <th>SlineBusiness</th>
        <th>Sproddesc</th>
        <th>DPOLL</th>
        <th>Sinsuredname</th>
        <th>GROSS</th>
        <th>Sdoi</th>
        <th>Sdoe</th>
        <th>TERRERISM</th>
        <th>ODTOTAL</th>
        <th>TP_TOTAL</th>
        <th>Premium for comm</th>
        <th>Sbusinesstype</th>
        <th>Comm</th>
        <th>Commm</th>
        <th>Smonth</th>
        <th>sandalonetppolicy</th>
        <th>Remark</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($model as $m){ ?>
    <tr>
        <td><?= $m->Sdivision; ?></td>
        <td><?= $m->Sdivisionname; ?></td>
        <td><?= $m->Ssourcetype; ?></td>
        <td><?= $m->Ssourcecode; ?></td>
        <td><?= $m->Ssourcename; ?></td>
        <td><?= $m->SlineBusiness; ?></td>
        <td><?= $m->Sproddesc; ?></td>
        <td><?= $m->DPOLL; ?></td>
        <td><?= $m->Sinsuredname; ?></td>
        <td><?= $m->GROSS; ?></td>
        <td><?= $m->Sdoi; ?></td>
        <td><?= $m->Sdoe; ?></td>
        <td><?= $m->TERRERISM; ?></td>
        <td><?= $m->ODTOTAL; ?></td>
        <td><?= $m->TP_TOTAL; ?></td>
        <td><?= $m->PREMIUMFORCOMM; ?></td>
        <td><?= $m->Sbusinesstype; ?></td>
        <td><?= $m->COMM; ?></td>
        <td><?= $m->COMMM; ?></td>
        <td><?= $m->Smonth; ?></td>
        <td><?= $m->SANDALONETPPOLICY; ?></td>
        <td><?= $m->REMARK; ?></td>
        <td><?= Html::a("Edit", ['stu/edit', 'id' => $m->id]  ); ?> </td>
        <td><?= Html::a("Delete", ['stu/del', 'id' => $m->id]  ); ?></td>
        </tr>
    <?php } ?>


</table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?> 
