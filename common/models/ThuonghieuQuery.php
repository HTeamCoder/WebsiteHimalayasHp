<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[thuonghieu]].
 *
 * @see thuonghieu
 */
class ThuonghieuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return thuonghieu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return thuonghieu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}