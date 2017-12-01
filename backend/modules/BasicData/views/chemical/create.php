<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\chemical */

$this->title = 'เพิ่มสารเคมี';
$this->params['breadcrumbs'][] = ['label' => 'สารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
