<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_chemical_view".
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
 * @property string $chemical_name
 * @property string $chemical_formula
 * @property integer $type_id
 * @property string $itemnamelist
 */
class ItemChemicalView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_chemical_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_ID', 'Remaining_volume', 'room_id', 'chemical_ID', 'grade_id', 'marker_id', 'user_id', 'type_id'], 'integer'],
            [['location', 'status', 'size', 'Remaining_volume', 'opendate', 'worningdate', 'expireddate', 'room_id', 'chemical_ID', 'grade_id', 'marker_id', 'user_id', 'chemical_name', 'chemical_formula', 'type_id'], 'required'],
            [['opendate', 'worningdate', 'expireddate'], 'safe'],
            [['location'], 'string', 'max' => 200],
            [['status', 'chemical_name', 'chemical_formula'], 'string', 'max' => 100],
            [['size'], 'string', 'max' => 20],
            [['itemnamelist'], 'string', 'max' => 126],
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
            'chemical_name' => 'ชื่อสารเคมี',
            'chemical_formula' => 'สูตรสารเคมี',
            'type_id' => 'รหัสประเภท',
            'itemnamelist' => 'Itemnamelist',
        ];
    }
}
