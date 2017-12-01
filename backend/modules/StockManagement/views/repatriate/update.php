<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\repatriate */

$this->title = 'Update Repatriate: ' . $model->repatriate_id;
$this->params['breadcrumbs'][] = ['label' => 'Repatriates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->repatriate_id, 'url' => ['view', 'id' => $model->repatriate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repatriate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
