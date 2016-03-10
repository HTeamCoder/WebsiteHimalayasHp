<?php

namespace common\models;

use Yii;
use common\components\func;
/**
 * This is the model class for table "{{%hanghoa}}".
 *
 * @property integer $id
 * @property string $tenhang
 * @property string $duongdan
 * @property string $tinhtrang
 * @property double $giaban
 * @property double $giacanhtranh
 * @property string $tomtat
 * @property string $mota
 * @property integer $loaihang_id
 * @property string $mahang
 * @property integer $thuonghieu_id
 *
 * @property Loaihang $loaihang
 * @property Thuonghieu $thuonghieu
 * @property Hinhanh[] $hinhanhs
 */
class hanghoa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hanghoa}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenhang', 'giaban', 'giacanhtranh', 'tomtat', 'mota', 'loaihang_id', 'thuonghieu_id','tinhtrang'], 'required'],
            ['tenhang', 'unique', 'message' => 'This tenhang has already been taken.'],
            [['tinhtrang', 'tomtat', 'mota'], 'string'],
            [['giaban', 'giacanhtranh'], 'number'],
            [['loaihang_id', 'thuonghieu_id'], 'integer'],
            [['tenhang', 'duongdan', 'mahang'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tenhang' => Yii::t('app', 'Tên hàng'),
            'duongdan' => Yii::t('app', 'Duongdan'),
            'tinhtrang' => Yii::t('app', 'Tình trạng'),
            'giaban' => Yii::t('app', 'Giá bán'),
            'giacanhtranh' => Yii::t('app', 'Giá cạnh tranh'),
            'tomtat' => Yii::t('app', 'Tóm tắt'),
            'mota' => Yii::t('app', 'Mô tả'),
            'loaihang_id' => Yii::t('app', 'Loaihang ID'),
            'mahang' => Yii::t('app', 'Mã hàng'),
            'thuonghieu_id' => Yii::t('app', 'Thuonghieu ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaihang()
    {
        return $this->hasOne(Loaihang::className(), ['id' => 'loaihang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThuonghieu()
    {
        return $this->hasOne(Thuonghieu::className(), ['id' => 'thuonghieu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHinhanhs()
    {
        return $this->hasMany(Hinhanh::className(), ['hanghoa_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return hanghoaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new hanghoaQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        $func = new func();
        $this->duongdan = $func->taoduongdan($this->tenhang);
        return parent::beforeSave($insert);
    }
}
