<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "journal".
 *
 * @property integer $id
 * @property string $journal_no
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 * @property integer $journal_type
 */
class Journal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'updated_at', 'created_by', 'updated_by', 'status', 'journal_type','issue_id'], 'integer'],
            [['journal_no'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 255],
            [['created_at',],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journal_no' => 'เลขที่เอกสาร',
            'description' => 'รายละเอียด',
            'created_at' => 'วันที่',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'journal_type' => 'Journal Type',
            'issue_id'=>'อ้างอิงใบเบิกเลขที่',
        ];
    }
    public static function getLastNo(){
    $model = Journal::find()->where(['journal_type'=>1])->andFilterWhere(['like','journal_no','IS'])->MAX('journal_no');
    if($model){
      $prefix = "IS".substr(date("Y"),2,2);
      $cnum = substr((string)$model,4,strlen($model));
      $len = strlen($cnum);
      $clen = strlen($cnum + 1);
      $loop = $len - $clen;
      for($i=1;$i<=$loop;$i++){
        $prefix.="0";
      }
      $prefix.=$cnum + 1;
      return $prefix;
    }else{
        $prefix ="IS".substr(date("Y"),2,2);
        return $prefix.'000001';
    }
  }
  public static function getLastReturnNo(){
    $model = Journal::find()->where(['journal_type'=>2])->andFilterWhere(['like','journal_no','RT'])->MAX('journal_no');
    if($model){
      $prefix = "RT".substr(date("Y"),2,2);
      $cnum = substr((string)$model,4,strlen($model));
      $len = strlen($cnum);
      $clen = strlen($cnum + 1);
      $loop = $len - $clen;
      for($i=1;$i<=$loop;$i++){
        $prefix.="0";
      }
      $prefix.=$cnum + 1;
      return $prefix;
    }else{
        $prefix ="RT".substr(date("Y"),2,2);
        return $prefix.'000001';
    }
  }
  public static function getNo($id){
    $model = Journal::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->journal_no:'';
  }
  public static function updatestock($id,$qty,$type){
    if($id!=''){
      $model = \common\models\Item::find()->where(['chemical_ID'=>$id])->one();
      if($model){
        if($type == 1){
           $model->Remaining_volume = $model->Remaining_volume + $qty; // return
        }else{
           $model->Remaining_volume = $model->Remaining_volume - $qty; //issue
        }
        $model->save(false);
       return true;
      }else{
        return false;
      }
    }
  }
}
