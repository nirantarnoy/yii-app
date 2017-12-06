<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Journal */

$this->title = 'สร้างหน่วยนับ';
$this->params['breadcrumbs'][] = ['label' => 'หน่วยนับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
