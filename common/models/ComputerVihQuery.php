<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ComputerVih]].
 *
 * @see ComputerVih
 */
class ComputerVihQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ComputerVih[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ComputerVih|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}