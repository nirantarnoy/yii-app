<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\StockManagement\models\RepatriateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repatriates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repatriate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repatriate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'repatriate_id',
            'repatriate_re:ntext',
            'repatriate_date',
            'requisition_id',
            'userlogin_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
