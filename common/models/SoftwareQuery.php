<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Software]].
 *
 * @see Software
 */
class SoftwareQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Software[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Software|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}