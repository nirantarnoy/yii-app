<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\marker */

$this->title = 'แก้ไข Marker: ' . $model->marker_id;
$this->params['breadcrumbs'][] = ['label' => 'Markers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->marker_id, 'url' => ['view', 'id' => $model->marker_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div></div>
