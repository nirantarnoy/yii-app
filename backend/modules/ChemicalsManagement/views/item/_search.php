<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ChemicalsManagement\models\ItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_ID') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'size') ?>

    <?= $form->field($model, 'Remaining_volume') ?>

    <?php // echo $form->field($model, 'opendate') ?>

    <?php // echo $form->field($model, 'worningdate') ?>

    <?php // echo $form->field($model, 'expireddate') ?>

    <?php // echo $form->field($model, 'room_id') ?>

    <?php // echo $form->field($model, 'chemical_ID') ?>

    <?php // echo $form->field($model, 'grade_id') ?>

    <?php // echo $form->field($model, 'marker_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
