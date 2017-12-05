<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Journal */

$this->title = 'แก้ไขใบคืน: ' . $model->journal_no;
$this->params['breadcrumbs'][] = ['label' => 'ใบเคืน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-update">
    <?= $this->render('_form', [
        'model' => $model,
        'expendlist' => $expendlist,
        'modelline' => $modelline,
    ]) ?>

</div>
