<?php

namespace common\models;
use common\models\ItemHasRequisition;

use Yii;

/**
 * This is the model class for table "requisition".
 *
 * @property integer $requisition_id
 * @property string $description_re
 * @property string $requisition_date
 * @property integer $userlogin_user_id
 *
 * @property ItemHasRequisition[] $itemHasRequisitions
 * @property Repatriate[] $repatriates
 * @property Userlogin $userloginUser
 */
class Requisition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_re', 'userlogin_user_id'], 'required'],
            [['description_re'], 'string'],
            [['requisition_date'], 'safe'],
            [['userlogin_user_id'], 'integer'],
           // [['userlogin_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userlogin::className(), 'targetAttribute' => ['userlogin_user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requisition_id' => 'รหัสการเบิกสารเคมี',
            'description_re' => 'รายละเอียดการเบิก',
            'requisition_date' => 'วันที่เบิกสารเคมี',
            'userlogin_user_id' => 'ผู้บันทึก',
             'item_ID' => 'รหัสไอเท็ม',
            'requisition_id' => 'รหัสการเบิกสารเคมี',
            'volum_apply' => 'ปริมาณสารเคมี',
            'req_method' => 'วิธีการเบิกสารเคมี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getItem()
    {
         return $this->hasOne(ItemHasRequisition::className(),['requisition_id'=>'item_ID']);
    }
    
   
    
    //////////////////////////////////////////////////////////////////
    
    
    
    public function getItemHasRequisitions()
    {
        return $this->hasMany(ItemHasRequisition::className(), ['requisition_id' => 'requisition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepatriates()
    {
        return $this->hasMany(Repatriate::className(), ['requisition_id' => 'requisition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserloginUser()
    {
        return $this->hasOne(Userlogin::className(), ['user_id' => 'userlogin_user_id']);
    }
}
