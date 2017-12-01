<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userlogin".
 *
 * @property integer $user_id
 * @property string $fname
 * @property string $lname
 * @property string $phone
 * @property string $active-flag
 * @property integer $authority_id
 *
 * @property Item[] $items
 * @property Repatriate[] $repatriates
 * @property Requisition[] $requisitions
 * @property User $user
 */
class Userlogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userlogin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'fname', 'lname', 'phone', 'active_flag', 'authority_id'], 'required'],
            [['user_id', 'authority_id'], 'integer'],
            [['fname', 'lname'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 10],
            [['active_flag'], 'string', 'max' => 1],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'รหัสผู้ใช้',
            'fname' => 'ชื่อผู้ใช้',
            'lname' => 'นามสกุล',
            'phone' => 'เบอร์โทรศัพท์',
            'active_flag' => 'สถานะผู้ใช้งานระบบ',
            'authority_id' => 'ตำแหน่งงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepatriates()
    {
        return $this->hasMany(Repatriate::className(), ['userlogin_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisitions()
    {
        return $this->hasMany(Requisition::className(), ['userlogin_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
