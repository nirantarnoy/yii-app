<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\requisition */

$this->title = 'แก้ไขบันทึกเบิกสารเคมี: ' . $model->requisition_id;
$this->params['breadcrumbs'][] = ['label' => 'บันทึกเบิกสารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->requisition_id, 'url' => ['view', 'id' => $model->requisition_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>