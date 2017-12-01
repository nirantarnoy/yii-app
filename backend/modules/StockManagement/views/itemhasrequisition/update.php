<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ItemHasRequisition */

$this->title = 'Update Item Has Requisition: ' . $model->item_ID;
$this->params['breadcrumbs'][] = ['label' => 'Item Has Requisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_ID, 'url' => ['view', 'id' => $model->item_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-has-requisition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
