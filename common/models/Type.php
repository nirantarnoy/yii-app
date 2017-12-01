<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $type_id
 * @property string $type_name
 *
 * @property Chemical[] $chemicals
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'รหัสประเภท',
            'type_name' => 'ชื่อประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChemicals()
    {
        return $this->hasMany(Chemical::className(), ['type_id' => 'type_id']);
    }
}
