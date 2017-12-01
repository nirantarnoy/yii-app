<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authority".
 *
 * @property integer $authority_id
 * @property string $authority_name
 */
class Authority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authority';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['authority_name'], 'required'],
            [['authority_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'authority_id' => 'รหัสตำแหน่งงาน',
            'authority_name' => 'ตำแหน่งงาน',
        ];
    }
}
