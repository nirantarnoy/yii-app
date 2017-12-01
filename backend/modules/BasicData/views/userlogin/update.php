<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\userlogin */

$this->title = 'Update Userlogin: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Userlogins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userlogin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
