<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SummaryOnSite]].
 *
 * @see SummaryOnSite
 */
class SummaryOnSiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SummaryOnSite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SummaryOnSite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}