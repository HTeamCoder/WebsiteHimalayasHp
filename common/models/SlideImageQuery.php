<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[slideimage]].
 *
 * @see slideimage
 */
class SlideImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return slideimage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return slideimage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}