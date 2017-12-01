<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\chemical */

$this->title = 'แก้ไขสารเคมี ' . $model->chemical_ID;
$this->params['breadcrumbs'][] = ['label' => 'สารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chemical_ID, 'url' => ['view', 'id' => $model->chemical_ID]];
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
