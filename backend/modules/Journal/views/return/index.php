<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คืนเคมี';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="panel panel-success">
    <div class="panel-heading">
        
    </div>
    <div class="panel-body">
        <p>
            <?= Html::a('สร้างใบคืนเคมี', ['create'], ['class' => 'btn btn-success']) ?>
         </p>
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                       // 'id',
                        'journal_no',
                        'description',
                         [
                            'attribute'=>'created_at',
                            'value'=> function($data){
                                return date('d-m-Y',$data->created_at);
                            }
                         ],
                        //'updated_at',
                        // 'created_by',
                        // 'updated_by',
                       //  'status',
                        // 'issue_id',
                         [
                            'attribute'=>'issue_id',
                            'value'=> function($data){
                                return \common\models\Journal::getNo($data->issue_id);
                            }
                         ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            <?php Pjax::end(); ?></div>
    </div>
</div>
    
