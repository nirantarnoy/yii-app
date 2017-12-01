<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\StockManagement\models\ItemHasRequisitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Has Requisitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-has-requisition-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item Has Requisition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_ID',
            'requisition_id',
            'volum_apply',
            'method',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
