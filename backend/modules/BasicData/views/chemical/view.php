<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\chemical */

$this->title = $model->chemical_ID;
$this->params['breadcrumbs'][] = ['label' => 'สารเคมี', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->chemical_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->chemical_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'chemical_ID',
            'chemical_name',
            'chemical_formula',
            'type.type_name',
            'category.category_name',
        ],
    ]) ?>

    </div></div>
