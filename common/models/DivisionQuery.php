<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Division]].
 *
 * @see Division
 */
class DivisionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Division[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Division|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}