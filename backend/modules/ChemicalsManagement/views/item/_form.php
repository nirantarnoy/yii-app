<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Room;
use common\models\Chemical;
use common\models\Grade;
use common\models\Marker;
use common\models\Userlogin;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">
<div class="ph-value-form">
<div class="row"> 
<div class="col-xs-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]),
        $this->registerCss("div.required label.control-label:after 
            {content: \" *\"; color: red; }")  ?>

    <?= $form->field($model, 'status')->dropDownList(['มี' => 'มี', 'ไม่มี' => 'ไม่มี']) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Remaining_volume')->textInput() ?>
    
    <?= $form->field($model, 'opendate')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'กรุณาเลือกวันที่...'],
    'readonly' => true,
    'language' => 'th',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
]);?>
    <?= $form->field($model, 'worningdate')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'กรุณาเลือกวันที่...'],
    'readonly' => true,
    'language' => 'th',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
]);?>

    <?= $form->field($model, 'expireddate')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'กรุณาเลือกวันที่...'],
    'readonly' => true,
    'language' => 'th',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
]);?>

    <?= $form->field($model, 'room_id')->label('ห้องเก็บสารเคมี')->dropDownList(ArrayHelper::map(Room::find()->all(), 'room_id', 'room_name')) ?>

    <?= $form->field($model, 'chemical_ID')->label('ชื่อสารเคมี')->dropDownList(ArrayHelper::map(Chemical::find()->all(), 'chemical_ID', 'chemical_name'))?>

    <?= $form->field($model, 'grade_id')->label('เกรดสารเคมี')->dropDownList(ArrayHelper::map(Grade::find()->all(), 'grade_id', 'grade_name')) ?>

    <?= $form->field($model, 'marker_id')->label('ไฟล์ Marker')->dropDownList(ArrayHelper::map(Marker::find()->all(), 'marker_id', 'file_name'))?>
    
    <?= $form->field($model, 'unit_id')->label('หน่วยนับ')->dropDownList(ArrayHelper::map(\common\models\Unit::find()->all(), 'id', 'name'))?>

  
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->getId()])->label(false); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <?= Html::resetButton('ยกเลิก', ['class' => 'reset btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
