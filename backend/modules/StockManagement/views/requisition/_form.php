<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ItemHasRequisition;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
//use common\models\Item;
use common\models\ItemChemicalView;

/* @var $this yii\web\View */
/* @var $model common\models\requisition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisition-form">

    <?php $form = ActiveForm::begin(
    		
    ); ?>
    
  

    <?= $form->field($model, 'description_re')->textarea(['rows' => 6]) ,
        $this->registerCss("div.required label.control-label:after 
            {content: \" *\"; color: red; }") ?>

    <?= $form->field($model, 'requisition_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'กรุณาเลือกวันที่...'],
    'readonly' => true,
    'language' => 'th',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
    ]);?>

    <?= $form->field($model, 'userlogin_user_id')->hiddenInput(['value'=> Yii::$app->user->identity->getId()])->label(false); ?>
    
    <?= $form->field($model_item, 'item_ID')->dropDownList(ArrayHelper::map(
                ItemChemicalView::find()
            ->all(), 'item_ID', 'itemnamelist')) ?>
    
    <?= $form->field($model_item, 'req_method')->radioList(array('0' => 'เบิกทั้งขวด', '1' =>'ยืมทั้งขวด', '2' =>'เบิกระบุจำนวนสารเคมี'), array('class' => 'i-checks'));      ?>
   <?= $form->field($model_item, 'volum_apply')->textInput() ?>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('ยกเลิก', ['class' => 'reset btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
