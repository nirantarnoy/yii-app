<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\StockManagement\models\ItemHasRequisitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-has-requisition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_ID') ?>

    <?= $form->field($model, 'requisition_id') ?>

    <?= $form->field($model, 'volum_apply') ?>

    <?= $form->field($model, 'method') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
