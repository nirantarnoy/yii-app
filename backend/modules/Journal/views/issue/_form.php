<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Journal */
/* @var $form yii\widgets\ActiveForm */
$unit = \common\models\Unit::find()->all();
?>

<div class="journal-form">
    <div class="row">
        <div class="col-12">
           <!--  <div class="alert alert-success">sds</div> -->
        </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <div class="panel-success">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-2">
                    <?= $form->field($model, 'journal_no')->textInput(['maxlength' => true,'readonly'=>'readonly','value'=>$model->isNewRecord?$runno:$model->journal_no]) ?>
                </div>
                 <div class="col-lg-3">
                     <?php if($model->isNewRecord){$model->created_at = date('d-m-Y');}else{$model->created_at = date('d-m-Y',$model->created_at);} ?>
                   <?= $form->field($model, 'created_at')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%',
                                           
                                      ]])->label() ?>
                </div>
                  <div class="col-lg-7">
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
                  <!-- <div class="col-lg-1">
                      <?php //echo $form->field($model, 'status')->textInput() ?>
                </div> -->
            </div>
                <hr>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="btn-group">
                            <div class="btn btn-primary btn-add-line">
                                เพิ่มรายการ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                   <th>#</th>
                                   <th>ชื่อเคมี</th>
                                   <th>วิธีเบิก</th>
                                   <th>ปริมาณเคมี</th>
                                   <th>หน่วยนับ</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody class="body-line">
                                <?php if(!$model->isNewRecord):?>
                                 <?php $i =0;?>
                                 <?php foreach($modelline as $value):?>
                                 <?php $i+=1;?>
                                     <tr>
                                        <td><?=$i;?></td>
                                        <td>
                                            <input type="text" class="form-control" name="chemical_code[]" value="<?=\common\models\Chemical::getName($value->chemical_id)?>">
                                            <input type="hidden" class="line_id" name="line_id" value="">
                                            <input type="hidden" class="chemical_id" name="chemical_id[]" value="<?=$value->chemical_id?>">
                                        </td>
                                        <td>
                                            <select class="form-control issue-type" name="issue_type[]">
                                                <?php
                                                    $select1 = '';
                                                    $select2 = '';
                                                    $select3 = '';
                                                    if($value->issue_type == 1){
                                                        $select1 = 'selected';
                                                    }
                                                     if($value->issue_type == 2){
                                                        $select2 = 'selected';
                                                    }
                                                     if($value->issue_type == 3){
                                                        $select3 = 'selected';
                                                    }
                                                ?>
                                                <option value="1" <?=$select1?>>เบิกทั้งขวด</option>
                                                <option value="2" <?=$select2?>>ยืมทั้งขวด</option>
                                                <option value="3" <?=$select3?>>ระบุจำนวน</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control qty" name="qty[]" value="<?=$value->qty;?>">
                                        </td>
                                         <td>
                                            <select class="form-control unit" name="unit[]">
                                              <?php foreach($unit as $data):?>
                                              <?php $select = '';
                                                    if($data->id == $value->unit_id){
                                                      $select  = 'selected';
                                                    }
                                              ?>
                                                <option value="<?=$data->id?>" <?=$select?>><?=$data->name?></option>
                                              <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="btn btn-danger btn-remove-line" onclick="removeline($(this))">ลบ</div>
                                        </td>
                                     </tr>
                                <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

    <?php ActiveForm::end(); ?>

</div>
<?php
   $url_to_add_line = Url::to(['issue/addline']);
   $url_to_findunit = Url::to(['issue/findunit']);
   $this->registerJs('
        $(function(){
            $(".btn-add-line").click(function(){
                var datax = '.$expendlist.';
                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: "'.$url_to_add_line.'",
                    data: {id: 1},
                    success: function(data){
                        $(".body-line").append(data);
                        $(".body-line tr:last td:eq(1) input").val("").autocomplete({
                            source: function (request, response) {
                                   var array = $.map(datax, function (value, key) {
                                        return {
                                            label: value.chemical_name,
                                            value: value.chemical_ID,
                                            name: value.chemical_name,
                                           // price: value.price
                                        }
                                    });
                                  response($.ui.autocomplete.filter(array, request.term));
                                
                            }, 
                            minLength: 0,
                            focus: function( event, ui ) {
                            $(this).val( ui.item.label);
                                return false;
                            },
                            select: function( event, ui ) {
                                $( this ).val( ui.item.label );
                                // $( "#project-id" ).val( ui.item.value );
                                // $( "#project-description" ).html( ui.item.desc );
                                // $( "#project-icon" ).attr( "src", "images/" + ui.item.icon );

                                $(this).closest("tr").find(".name").val(ui.item.name);
                                //$(this).closest("tr").find(".price").val(ui.item.price);
                                $(this).closest("tr").find(".chemical_id").val(ui.item.value);
                                $(this).closest("tr").find(".qty").val(1);
                                $(this).closest("tr").find(".unit").val(showUnit(ui.item.value));
                                
                                 
                                return false;
                              }
                        });
                      
                    }   
                });
            });

        });

         function removeline(e){
            if(confirm("ต้องการลบรายการใช่หรือไม่")){
                e.parent().parent().remove();
            }
         }
         function showUnit(id){
           var name = "niran";
           if(id != ""){
                     // alert(id);
              $.ajax({
                type: "post",
                dataType: "html",
                async: false,
                url: "'.$url_to_findunit.'",
                data: {ids: id},
                success: function(data){
                   name = data;
                }
              });
              return name;
           }
           
         }
        
    ',static::POS_END);
 ?>