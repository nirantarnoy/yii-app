<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\repatriate */

$this->title = $model->repatriate_id;
$this->params['breadcrumbs'][] = ['label' => 'Repatriates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repatriate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->repatriate_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->repatriate_id], [
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
            'repatriate_id',
            'repatriate_re:ntext',
            'repatriate_date',
            'requisition_id',
            'userlogin_user_id',
        ],
    ]) ?>

</div>
