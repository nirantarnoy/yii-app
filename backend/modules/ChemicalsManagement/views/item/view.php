<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Room;
/* @var $this yii\web\View */
/* @var $model common\models\item */

$this->title = $model->item_ID;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->item_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->item_ID], [
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
            'item_ID',
            'location',
            'status',
            'size',
            'Remaining_volume',
            'opendate',
            'worningdate',
            'expireddate',
            'room.room_name',
            'chemical.chemical_name',
            'grade.grade_name',
            'marker.file_name',
            'user.fname',
        ],
    ]) ?>

    </div></div>
