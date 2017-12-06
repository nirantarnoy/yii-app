<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\Url;

$this->title = "รายงานประวัติใบเบิกเคมี";

$fdate = date('d-m-Y');
$tdate = date('d-m-Y');

if($from_date != '' && $from_date != '01-01-1970'){
	$fdate =$from_date;
}
if($to_date != '' && $from_date != '01-01-1970'){
	$tdate = $to_date;
}



 ?>
 <form id="my-form" action="<?=Url::to(['/Reports/issuereport'],true)?>" method="post">
 <div class="row">
 	<div class="col-lg-3">
 		<?php
 			echo '<label class="control-label">ข้อมูลวันที่</label>';
			echo DatePicker::widget([
			    'name' => 'from_date',
			    'type' => DatePicker::TYPE_COMPONENT_APPEND,
			    'value' => $fdate,
			    'pluginOptions' => [
			        'autoclose'=>true,
			        'format' => 'dd-mm-yyyy'
			    ]
			]);
 		 ?>
 	</div>
 	<div class="col-lg-3">
 		<?php
 			echo '<label class="control-label">ถึงวันที่</label>';
			echo DatePicker::widget([
			    'name' => 'to_date',
			    'type' => DatePicker::TYPE_COMPONENT_APPEND,
			    'value' => $tdate,
			    'pluginOptions' => [
			        'autoclose'=>true,
			        'format' => 'dd-mm-yyyy'
			    ]
			]);
 		 ?>
 	</div>
 	<div class="col-lg-2">
 		<input type="submit" class="btn btn-success" style="margin-top: 25px;" value="ค้นหา">
 	</div>
 	
 </div>
 </form>
 <br />
 <div class="row">
 	<div class="col-lg-12">
 		<div class="panel panel-success">
 			<div class="panel-body">
 				<?= GridView::widget([
                    'dataProvider' => $dataProvider,
                   // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                       // 'id',
                        
                        //'description',
                        //'description',
                         [
                            'attribute'=>'created_at',
                            'label'=>'วันที่เบิก',
                            'format'=>'html',
                            'value'=> function($data){
                            	return '<i class="fa fa-clock-o text-primary"></i> '.$data->created_at;
                               // return date('d-m-Y',$data->created_at);
                            }
                         ],
                         // 'journal_no',
                         // 'chemical_name',
                          [
                            'attribute'=>'journal_no',
                            'label'=>'เลขที่ใบเบิก',
                            'value'=> function($data){
                            	return $data->journal_no;
                               // return date('d-m-Y',$data->created_at);
                            }
                         ],
                          [
                            'attribute'=>'chemical_name',
                            'label'=>'รายละอียดเคมี',
                            'value'=> function($data){
                            	return $data->chemical_name;
                               // return date('d-m-Y',$data->created_at);
                            }
                         ],
                         'qty',
                          [
                            'attribute'=>'return_qty',
                            'label'=>'จำนวนคืน',
                            'value'=> function($data){
                            	return $data->return_qty == null?0:$data->return_qty;
                               // return date('d-m-Y',$data->created_at);
                            }
                         ],
                         'unit_name',
                          [
                            'attribute'=>'username',
                            'label'=>'บันทึกโดย',
                            'value'=> function($data){
                            	return $data->username;
                               // return date('d-m-Y',$data->created_at);
                            }
                         ],
                        //'updated_at',
                        // 'created_by',
                        // 'updated_by',
                         //'status',
                        // 'journal_type',

                       // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

 			</div>
 		</div>
 	</div>
 </div>
