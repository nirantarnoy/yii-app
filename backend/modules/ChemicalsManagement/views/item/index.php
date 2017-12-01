<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ChemicalsManagement\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_ID',
            'location',
            'status',
            'size',
            'Remaining_volume',
            // 'opendate',
            // 'worningdate',
            // 'expireddate',
            // 'room.room_name',
            // 'chemical.chemical_name',
            // 'grade.grade_name',
            // 'marker.file_name',
            // 'user.fname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div></div>
