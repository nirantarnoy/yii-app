<?php
namespace backend\modules\Unit\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Unit extends \common\models\Unit
{
  public function behaviors()
{
    return [
        'timestampcdate'=>[
            'class'=> \yii\behaviors\AttributeBehavior::className(),
            'attributes'=>[
            ActiveRecord::EVENT_BEFORE_INSERT=>'created_at',
            ],
            'value'=> time(),
        ],
      
    ];
 }
 public static function getUnitname($id){
    $model = Unit::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->name:'';
 }

}
