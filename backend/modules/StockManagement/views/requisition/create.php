<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\requisition */

$this->title = 'เพิ่มบันทึกเบิกสารเคมี';
$this->params['breadcrumbs'][] = ['label' => 'บันทึกเบิกสารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
        'model_item' => $model_item,
    ]) ?>

</div>
</div>