<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemHasRequisition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-has-requisition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_ID')->textInput() ?>

    <?= $form->field($model, 'requisition_id')->textInput() ?>

    <?= $form->field($model, 'volum_apply')->textInput() ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
