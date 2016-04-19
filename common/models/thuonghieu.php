<?php

namespace common\models;

use Yii;
use common\components\func;
/**
 * This is the model class for table "{{%thuonghieu}}".
 *
 * @property integer $id
 * @property string $ten
 * @property string $duongdan
 *
 * @property Hanghoa[] $hanghoas
 */
class thuonghieu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%thuonghieu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            ['ten','unique'],
            [['ten', 'duongdan'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ten' => Yii::t('app', 'Thương hiệu'),
            'duongdan' => Yii::t('app', 'Đường dẫn'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoas()
    {
        return $this->hasMany(Hanghoa::className(), ['thuonghieu_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ThuonghieuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ThuonghieuQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        $func = new func();
        $this->duongdan = $func->taoduongdan($this->ten);
        return parent::beforeSave($insert);
    }
}
