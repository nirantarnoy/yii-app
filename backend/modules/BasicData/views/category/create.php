<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\category */

$this->title = 'เพิ่มหมวดหมู่สารเคมี';
$this->params['breadcrumbs'][] = ['label' => 'หมวดหมู่สารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
