<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property integer $grade_id
 * @property string $grade_name
 *
 * @property Item[] $items
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade_name'], 'required'],
            [['grade_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grade_id' => 'รหัสเกรด',
            'grade_name' => 'ชื่อเกรด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['grade_id' => 'grade_id']);
    }
}
