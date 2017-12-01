<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\userlogin */

$this->title = 'Create Userlogin';
$this->params['breadcrumbs'][] = ['label' => 'Userlogins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlogin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
