<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%nhacungcap}}".
 *
 * @property integer $id
 * @property string $tennhacungcap
 * @property string $diachi
 * @property string $sodienthoai
 * @property string $email
 *
 * @property Hanghoa[] $hanghoas
 */
class nhacungcap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nhacungcap}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tennhacungcap', 'email'], 'required'],
            [['tennhacungcap', 'email'], 'string', 'max' => 45],
            [['sodienthoai'], 'string','max'=>11,'min'=>10],
            [['sodienthoai'], 'number'],
            ['email', 'email'],
            ['tennhacungcap', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tennhacungcap' => Yii::t('app', 'Tên nhà cung cấp'),
            'diachi' => Yii::t('app', 'Địa chỉ'),
            'sodienthoai' => Yii::t('app', 'Số điện thoại'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoas()
    {
        return $this->hasMany(Hanghoa::className(), ['nhacungcap_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return NhacungcapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NhacungcapQuery(get_called_class());
    }
}
