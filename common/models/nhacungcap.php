<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii2_nha_cung_cap".
 *
 * @property integer $id
 * @property string $ten
 * @property string $dia_chi
 * @property string $email
 * @property string $so_dien_thoai
 */
class nhacungcap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_nha_cung_cap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'dia_chi'], 'required'],
            [['ten', 'email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['dia_chi'], 'string', 'max' => 200],
            [['so_dien_thoai'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ten' => Yii::t('app', 'Tên'),
            'dia_chi' => Yii::t('app', 'Địa chỉ'),
            'email' => Yii::t('app', 'Email'),
            'so_dien_thoai' => Yii::t('app', 'Số điện thoại'),
        ];
    }

    /**
     * @inheritdoc
     * @return Yii2NhaCungCapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Yii2NhaCungCapQuery(get_called_class());
    }
}
