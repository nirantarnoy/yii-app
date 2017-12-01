<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\BasicData\models\ChemicalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สารเคมี';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?> </h3>
    </div>
    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มสารเคมี', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'chemical_ID',
            'chemical_name',
            'chemical_formula',
          //  'type.type_name',
         //   'category.category_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div> </div>
