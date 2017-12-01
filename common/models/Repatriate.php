<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "repatriate".
 *
 * @property integer $repatriate_id
 * @property string $repatriate_re
 * @property string $repatriate_date
 * @property integer $requisition_id
 * @property integer $userlogin_user_id
 *
 * @property Requisition $requisition
 * @property Userlogin $userloginUser
 */
class Repatriate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repatriate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['repatriate_re'], 'string'],
            [['repatriate_date'], 'safe'],
            [['requisition_id', 'userlogin_user_id'], 'required'],
            [['requisition_id', 'userlogin_user_id'], 'integer'],
            [['requisition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Requisition::className(), 'targetAttribute' => ['requisition_id' => 'requisition_id']],
            [['userlogin_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userlogin::className(), 'targetAttribute' => ['userlogin_user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'repatriate_id' => 'รหัสการคืนสารเคมี',
            'repatriate_re' => 'รายละเอียดการคืนสารเคมี',
            'repatriate_date' => 'วันที่คืนสารเคมี',
            'requisition_id' => 'รหัสการเบิกสารเคมี',
            'userlogin_user_id' => 'Userlogin User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisition()
    {
        return $this->hasOne(Requisition::className(), ['requisition_id' => 'requisition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserloginUser()
    {
        return $this->hasOne(Userlogin::className(), ['user_id' => 'userlogin_user_id']);
    }
}
