<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[hanghoa]].
 *
 * @see hanghoa
 */
class HanghoaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return hanghoa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return hanghoa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}