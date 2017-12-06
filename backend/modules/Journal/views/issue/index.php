<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เบิกเคมี';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="panel panel-success">
    <div class="panel-heading">
        
    </div>
    <div class="panel-body">
    <p>
        <?= Html::a('สร้างใบเบิกเคมี', ['create'], ['class' => 'btn btn-success']) ?>
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
                         //'status',
                        // 'journal_type',

                       
                                                       [

                                                          'header' => '',
                                                          'headerOptions' => ['style' => 'width: 160px;text-align:center;','class' => 'activity-view-link',],
                                                          'class' => 'yii\grid\ActionColumn',
                                                          'contentOptions' => ['style' => 'text-align: center'],
                                                          'buttons' => [
                                                              'view' => function($url, $data, $index) {
                                                                  $options = [
                                                                      'title' => Yii::t('yii', 'View'),
                                                                      'aria-label' => Yii::t('yii', 'View'),
                                                                      'data-pjax' => '0',
                                                                  ];
                                                                  return Html::a(
                                                                                  '<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                                                              },
                                                                  'update' => function($url, $data, $index) {
                                                                  $options = array_merge([
                                                                      'title' => Yii::t('yii', 'Update'),
                                                                      'aria-label' => Yii::t('yii', 'Update'),
                                                                      'data-pjax' => '0',
                                                                      'id'=>'modaledit',
                                                                  ]);
                                                                  return  Html::a(
                                                                                    '<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                                                      'id' => 'activity-view-link',
                                                                                      //'data-toggle' => 'modal',
                                                                                      // 'data-target' => '#modal',
                                                                                      'data-id' => $index,
                                                                                      'data-pjax' => '0',
                                                                                     // 'style'=>['float'=>'rigth'],
                                                                          ]);
                                                              },
                                                                      'delete' => function($url, $data, $index) {
                                                                          $options = array_merge([
                                                                            'title' => Yii::t('yii', 'Delete'),
                                                                            'aria-label' => Yii::t('yii', 'Delete'),
                                                                            //'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                                            //'data-method' => 'post',
                                                                            //'data-pjax' => '0',
                                                                            'onclick'=>'recDelete($(this));'
                                                                          ]);
                                                                  return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:void(0)', $options);
                                                              }
                                                                  ]
                                                          ],
                    ],
                ]); ?>
            <?php Pjax::end(); ?></div>
</div>
</div>