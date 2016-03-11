<?php

namespace common\models;

use Yii;
use common\components\func;
/**
 * This is the model class for table "{{%loaihang}}".
 *
 * @property integer $id
 * @property string $tenloai
 * @property string $duongdan
 * @property integer $nhomloaihang
 *
 * @property Hanghoa[] $hanghoas
 *
 * @property loaihang $nhomloaihang0
 * @property loaihang[] $loaihangs
 */
/*
 * Thắng ơi test đi này :v d
 */
class loaihang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loaihang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenloai'], 'required'],
            [['nhomloaihang'], 'integer'],
            [['tenloai', 'duongdan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tenloai' => Yii::t('app', 'Tên loại'),
            'duongdan' => Yii::t('app', 'Duongdan'),
            'nhomloaihang' => Yii::t('app', 'Nhóm loại hàng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoas()
    {
        return $this->hasMany(Hanghoa::className(), ['loaihang_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNhomloaihang0()
    {
        return $this->hasOne(loaihang::className(), ['id' => 'nhomloaihang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaihangs()
    {
        return $this->hasMany(loaihang::className(), ['nhomloaihang' => 'id']);
    }

    /**
     * @inheritdoc
     * @return LoaihangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoaihangQuery(get_called_class());
    }
	
	public function beforeSave($insert)
    {
        $func = new func();
        $this->duongdan = $func->taoduongdan($this->tenloai);
        return parent::beforeSave($insert); 
    }
}
