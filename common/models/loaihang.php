<?php

namespace common\models;

use Yii;
use common\components\func;
use yii\helpers\Url;
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
            ['tenloai','unique'],
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
            'duongdan' => Yii::t('app', 'Đường dẫn'),
            'nhomloaihang' => Yii::t('app', 'Nhóm loại hàng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoas()
    {
        return $this->hasMany(hanghoa::className(), ['loaihang_id' => 'id']);
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
    public function menuLoaihang($nhomloaihang)
    {
        $menuStr = '';
        if(isset($nhomloaihang))
        {
            $dsnhomloaihang = $this->findAll(['nhomloaihang'=>$nhomloaihang]);

            if($dsnhomloaihang)
            {
               foreach ($dsnhomloaihang as $loaihang) {
                    $menuStr .='
                            <li><a href="'.Url::to(['hanghoa/danhmuc','id'=>$loaihang->id]).'">'.$loaihang['tenloai'].'</a></li>
                            ';
                } 
            }
            return $menuStr;
        }
        return false;
    }
    
}
