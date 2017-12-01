<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Type;
use common\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\chemical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chemical-form">
    <div class="ph-value-form">
<div class="row"> 
<div class="col-xs-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chemical_name')->textInput(['maxlength' => true]), 
        $this->registerCss("div.required label.control-label:after {
        content: \" *\";color: red; }") ?>

    <?= $form->field($model, 'chemical_formula')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(Type::find()->all(), 'type_id', 'type_name'))?> 
    
   

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'))  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('ยกเลิก', ['class' => 'reset btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
