<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\category */

$this->title = 'แก้ไขหมวดหมู่สารเคมี: ' . $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'หมวดหมู่สารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'id' => $model->category_id]];
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

</div>
</div>
