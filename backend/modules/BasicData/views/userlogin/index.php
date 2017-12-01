<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\BasicData\models\UserLoginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userlogins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlogin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userlogin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'fname',
            'lname',
            'phone',
            'active_flag',
            // 'authority_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
</div>
