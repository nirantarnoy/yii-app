<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_has_requisition".
 *
 * @property integer $item_ID
 * @property integer $requisition_id
 * @property integer $volum_apply
 * @property integer $req_method
 *
 * @property Item $item
 * @property Requisition $requisition
 */
class ItemHasRequisition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_has_requisition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_ID', 'requisition_id','req_method'], 'required'],
            [['item_ID', 'requisition_id', 'volum_apply', 'req_method'], 'integer'],
            [['item_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_ID' => 'item_ID']],
            [['requisition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Requisition::className(), 'targetAttribute' => ['requisition_id' => 'requisition_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_ID' => 'รหัสไอเท็ม',
            'requisition_id' => 'รหัสการเบิกสารเคมี',
            'volum_apply' => 'ปริมาณสารเคมี',
            'req_method' => 'วิธีการเบิกสารเคมี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_ID' => 'item_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisition()
    {
        return $this->hasOne(Requisition::className(), ['requisition_id' => 'requisition_id']);
    }
}
