<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[hinhanh]].
 *
 * @see hinhanh
 */
class HinhanhQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return hinhanh[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return hinhanh|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}