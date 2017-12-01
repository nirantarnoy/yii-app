<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\repatriate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repatriate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'repatriate_re')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'repatriate_date')->textInput() ?>

    <?= $form->field($model, 'requisition_id')->textInput() ?>

    <?= $form->field($model, 'userlogin_user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
