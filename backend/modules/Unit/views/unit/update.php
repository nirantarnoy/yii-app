<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Journal */

$this->title = 'แก้ไขหน่วยนับ: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'หน่วยนับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
