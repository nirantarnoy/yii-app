<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[chemical]].
 *
 * @see chemical
 */
class cQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return chemical[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return chemical|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
