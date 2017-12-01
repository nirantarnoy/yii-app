<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ChemicalsManagement\models\MarkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Markers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม Marker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'marker_id',
            'file_name',
            [
                'attribute' => 'file_img',
                'format' => 'html',
                'value' => function($model){
                    return Html::img('upload/marker/'.$model->file_name, ['class' => 'thumbnail', 'width' => 150, 'alt' =>$model->file_name,]);
                }  
            ],
            


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>