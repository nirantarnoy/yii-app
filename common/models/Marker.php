<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marker".
 *
 * @property integer $marker_id
 * @property string $file_name
 *
 * @property Item[] $items
 */
class Marker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file_img;
    public static function tableName()
    {
        return 'marker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_name'], 'required'],
            [['file_name'], 'string', 'max' => 200],
            [['file_img'],'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'marker_id' => 'รหัสMarker',
            'file_name' => 'ชื่อไฟล์ Marker',
            'file_img' => 'ภาพ Marker',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['marker_id' => 'marker_id']);
    }
}
