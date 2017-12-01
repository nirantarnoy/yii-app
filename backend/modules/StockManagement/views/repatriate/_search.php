<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\StockManagement\models\RepatriateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repatriate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'repatriate_id') ?>

    <?= $form->field($model, 'repatriate_re') ?>

    <?= $form->field($model, 'repatriate_date') ?>

    <?= $form->field($model, 'requisition_id') ?>

    <?= $form->field($model, 'userlogin_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
