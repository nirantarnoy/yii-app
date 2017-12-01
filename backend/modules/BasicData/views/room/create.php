<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\room */

$this->title = 'เพิ่มห้องเก็บสารเคมี';
$this->params['breadcrumbs'][] = ['label' => 'ห้องเก็บสารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
