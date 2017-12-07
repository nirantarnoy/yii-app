<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "journal_line".
 *
 * @property integer $id
 * @property integer $journal_id
 * @property integer $chemical_id
 * @property integer $qty
 */
class JournalLine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journal_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['journal_id', 'chemical_id', 'qty','unit_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journal_id' => 'Journal ID',
            'chemical_id' => 'Chemical ID',
            'qty' => 'Qty',
        ];
    }
}
