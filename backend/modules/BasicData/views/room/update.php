<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\room */

$this->title = 'แก้ไขห้องเก็บสารเคมี: ' . $model->room_id;
$this->params['breadcrumbs'][] = ['label' => 'ห้องเก็บสารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_id, 'url' => ['view', 'id' => $model->room_id]];
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

    </div></div>
