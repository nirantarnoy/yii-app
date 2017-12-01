<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\marker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marker-form">
    <div class="ph-value-form">
<div class="row"> 
<div class="col-xs-6">
    <?php if(!$model->isNewRecord){?>
    <?=Html::img('upload/marker/'.$model->file_name, ['class' => 'img-responsive thumbnail']);?>
    <?php
    }
    ?>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

<?php echo FileInput::widget([
    'name' => 'file_img',
    'pluginOptions' => [
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
    ]
]);
 ?>
             

    <div class="form-group">
       
    </div>

    <?php ActiveForm::end(); ?>

</div>
