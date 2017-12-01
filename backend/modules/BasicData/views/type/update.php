<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\type */

$this->title = 'แก้ไขประเภทสารเคมี: ' . $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทสารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
