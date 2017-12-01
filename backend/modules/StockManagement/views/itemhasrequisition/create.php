<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ItemHasRequisition */

$this->title = 'Create Item Has Requisition';
$this->params['breadcrumbs'][] = ['label' => 'Item Has Requisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-has-requisition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
