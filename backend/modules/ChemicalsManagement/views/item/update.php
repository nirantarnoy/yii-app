<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\item */

$this->title = 'แก้ไข Item: ' . $model->item_ID;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_ID, 'url' => ['view', 'id' => $model->item_ID]];
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
