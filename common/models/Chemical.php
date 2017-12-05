<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chemical".
 *
 * @property integer $chemical_ID
 * @property string $chemical_name
 * @property string $chemical_formula
 * @property integer $type_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property Type $type
 * @property Item[] $items
 */
class Chemical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chemical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chemical_name', 'chemical_formula', 'type_id', 'category_id'], 'required'],
            [['type_id', 'category_id'], 'integer'],
            [['chemical_name', 'chemical_formula'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'chemical_ID' => 'รหัสสารเคมี',
            'chemical_name' => 'ชื่อสารเคมี',
            'chemical_formula' => 'สูตรสารเคมี',
            'type_id' => 'ประเภทสารเคมี',
            'category_id' => 'หมวดหมู่สารเคมี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['type_id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['chemical_ID' => 'chemical_ID']);
    }
    public static function getName($id){
        $model = Chemical::find()->where(['chemical_ID'=>$id])->one();
        return count($model)>0?$model->chemical_name:'';
    }
}
