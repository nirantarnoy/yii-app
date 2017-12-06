<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_issue".
 *
 * @property integer $id
 * @property string $journal_no
 * @property string $description
 * @property string $created_at
 * @property integer $chemical_id
 * @property string $chemical_name
 * @property string $chemical_formula
 * @property integer $qty
 * @property integer $return_qty
 * @property string $username
 * @property string $issue_no
 */
class ViewIssue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_issue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'chemical_id', 'qty', 'return_qty','unit_id'], 'integer'],
            [['chemical_name', 'chemical_formula', 'username','unit_name'], 'required'],
            [['journal_no', 'issue_no'], 'string', 'max' => 25],
            [['description', 'username'], 'string', 'max' => 255],
            [['created_at'], 'string', 'max' => 24],
            [['chemical_name', 'chemical_formula'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journal_no' => 'Journal No',
            'description' => 'Description',
            'created_at' => 'Created At',
            'chemical_id' => 'Chemical ID',
            'chemical_name' => 'Chemical Name',
            'chemical_formula' => 'Chemical Formula',
            'qty' => 'Qty',
            'return_qty' => 'Return Qty',
            'username' => 'Username',
            'issue_no' => 'Issue No',
            'unit_name' => 'หน่วยนับ',
        ];
    }
}
