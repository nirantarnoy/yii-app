<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $item_ID
 * @property string $location
 * @property string $status
 * @property string $size
 * @property integer $Remaining_volume
 * @property string $opendate
 * @property string $worningdate
 * @property string $expireddate
 * @property integer $room_id
 * @property integer $chemical_ID
 * @property integer $grade_id
 * @property integer $marker_id
 * @property integer $user_id
 *
 * @property Chemical $chemical
 * @property Room $room
 * @property Grade $grade
 * @property Marker $marker
 * @property Userlogin $user
 * @property ItemHasRequisition $itemHasRequisition
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location', 'status', 'size', 'Remaining_volume', 'opendate', 'worningdate', 'room_id', 'chemical_ID', 'grade_id', 'marker_id', 'user_id'], 'required'],
            [['Remaining_volume', 'room_id', 'chemical_ID', 'grade_id', 'marker_id', 'user_id','unit_id'], 'integer'],
            [['opendate', 'worningdate', 'expireddate'], 'safe'],
            [['location'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 100],
            [['size'], 'string', 'max' => 20],
            [['chemical_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Chemical::className(), 'targetAttribute' => ['chemical_ID' => 'chemical_ID']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'room_id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grade::className(), 'targetAttribute' => ['grade_id' => 'grade_id']],
            [['marker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marker::className(), 'targetAttribute' => ['marker_id' => 'marker_id']],
          //  [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userlogin::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_ID' => 'รหัสไอเท็ม',
            'location' => 'จุดวางสารเคมี',
            'status' => 'สถานะสารเคมี',
            'size' => 'ขนาดบรรจุภัณฑ์',
            'Remaining_volume' => 'ปริมาณคงเหลือ',
            'opendate' => 'วันที่เปิดสารเคมี',
            'worningdate' => ' วันใกล้หมดอายุสารเคมี',
            'expireddate' => 'วันหมดอายุสารเคมี',
            'room_id' => 'รหัสห้อง',
            'chemical_ID' => 'รหัสสารเคมี',
            'grade_id' => 'รหัสเกรด',
            'marker_id' => 'รหัสMarker',
            'user_id' => 'รหัสผู้ใช้',
            'unit_id' => 'หน่วยนับ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChemical()
    {
        return $this->hasOne(Chemical::className(), ['chemical_ID' => 'chemical_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['room_id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['grade_id' => 'grade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarker()
    {
        return $this->hasOne(Marker::className(), ['marker_id' => 'marker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userlogin::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemHasRequisition()
    {
        return $this->hasOne(ItemHasRequisition::className(), ['item_ID' => 'item_ID']);
    }
    public static function getUnitid($item){
      $model = Item::find()->where(['chemical_ID'=>$item])->one();
      return count($model)>0?$model->unit_id:0;
    }

}
