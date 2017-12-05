<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Journal */

$this->title = 'สร้างใบคืน';
$this->params['breadcrumbs'][] = ['label' => 'ใบคืน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-create">

    <?= $this->render('_form', [
        'model' => $model,
        'runno' => $runno,
        'expendlist' => $expendlist,
    ]) ?>

</div>
