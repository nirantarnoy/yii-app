<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\repatriate */

$this->title = 'Create Repatriate';
$this->params['breadcrumbs'][] = ['label' => 'Repatriates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repatriate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
