<?php

namespace common\models;

use Yii;
use sjaakp\taggable\TaggableBehavior;
use common\components\func;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
use yii\web\UploadedFile;
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
 * @property string $anhdaidien
 * @property integer $soluong
 *
 * @property Loaihang $loaihang
 * @property Thuonghieu $thuonghieu
 * @property Hinhanh[] $hinhanhs
 * @property Tukhoahanghoa[] $tukhoahanghoas
 */
class hanghoa extends \yii\db\ActiveRecord
{
    public $anh;
    use CartPositionTrait;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagClass' => tukhoa::className(),
                'junctionTable' => 'yii2_tukhoahanghoa',
            ]
        ];
    }

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
            [['tenhang', 'loaihang_id', 'thuonghieu_id','mahang','nhacungcap_id','tinhtrang'], 'required'],
            ['tenhang','unique'],
            [['tinhtrang', 'tomtat', 'mota'], 'string'],
            [['giaban', 'giacanhtranh','soluong'], 'number','min'=>0],
            [['loaihang_id', 'thuonghieu_id', 'nhacungcap_id','soluong'], 'integer'],
            [['tenhang', 'duongdan', 'mahang'], 'string', 'max' => 45],
            [['anhdaidien'], 'string', 'max' => 50],
            [['anh'], 'file', 'maxSize' => 1024*1024,'extensions' => 'png, jpg'],
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
            'duongdan' => Yii::t('app', 'Đường dẫn'),
            'tinhtrang' => Yii::t('app', 'Trình trạng'),
            'giaban' => Yii::t('app', 'Giá bán'),
            'giacanhtranh' => Yii::t('app', 'Giá cạnh tranh'),
            'tomtat' => Yii::t('app', 'Tóm tắt'),
            'mota' => Yii::t('app', 'Mô tả'),
            'loaihang_id' => Yii::t('app', 'Loại hàng'),
            'mahang' => Yii::t('app', 'Mã hàng'),
            'thuonghieu_id' => Yii::t('app', 'Thương hiệu'),
            'nhacungcap_id' => Yii::t('app', 'Nhà cung cấp'),
            'anhdaidien' => Yii::t('app', 'Ảnh đại diện'),
            'anh' => Yii::t('app', 'Ảnh đại diện'),
            'soluong' => Yii::t('app', 'Số lượng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaihang()
    {
        return $this->hasOne(loaihang::className(), ['id' => 'loaihang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThuonghieu()
    {
        return $this->hasOne(thuonghieu::className(), ['id' => 'thuonghieu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHinhanhs()
    {
        return $this->hasMany(hinhanh::className(), ['hanghoa_id' => 'id']);
    }

    public function getNhacungcap()
    {
        return $this->hasOne(nhacungcap::className(), ['id' => 'nhacungcap_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTukhoahanghoas()
    {
        return $this->hasMany(tukhoahanghoa::className(), ['hanghoa_id' => 'id']);
    }

     public function getDonhangchitiets()
    {
        return $this->hasMany(Donhangchitiet::className(), ['hanghoa_id' => 'id']);
    }
    /**
     * @inheritdoc
     * @return HanghoaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HanghoaQuery(get_called_class());
    }

    public function afterSave($insert,$changedAttributes){
        $hinhanh = new hinhanh();
        $hinhanh->file = UploadedFile::getInstances($hinhanh,'file');
        if ($hinhanh->file)
        {

            foreach ($hinhanh->file as $key=>$val)
            {
                $val->saveAs('uploads/'.time().'-'.substr(sha1($key+1),0,10).'.'.$val->extension);
                $hinhanh1 = new hinhanh();
                $hinhanh1->path = 'uploads/'.time().'-'.substr(sha1($key+1),0,10).'.'.$val->extension;
                $hinhanh1->hanghoa_id = $this->id;
                $hinhanh1->save();
            }
        }

        return parent::afterSave($insert,$changedAttributes);
    }
    public function beforeSave($insert)
    {
        $func = new func();
        $this->duongdan = $func->taoduongdan($this->tenhang);
        if ($this->soluong != 0)
            $this->tinhtrang = 'conhang';
        else
            $this->tinhtrang = 'hethang';
        $this->anh = UploadedFile::getInstance($this,'anh');
        $anhdaidien = $this->findOne($this->id);
        if ($this->anh)
        {
            if($anhdaidien && file_exists($anhdaidien->anhdaidien))
            {
                unlink($anhdaidien->anhdaidien);
            }
            $this->anh->saveAs('uploads/'.time().'-'.$this->duongdan.'.'.$this->anh->extension);
            $this->anhdaidien = 'uploads/'.time().'-'.$this->duongdan.'.'.$this->anh->extension;
        }
        return parent::beforeSave($insert);
    }
    public function beforeDelete()
    {

        $tukhoa = new tukhoa();
        $tukhoahanghoa = new tukhoahanghoa();
        $tukhoahanghoas = $tukhoahanghoa->findAll(['hanghoa_id'=>$this->id]);
        if ($tukhoahanghoas)
        {
            foreach ($tukhoahanghoas as $tukhoas)
            {
                if (count($tukhoahanghoa->findAll(['tukhoa_id'=>$tukhoas->tukhoa_id])) === 1)
                {
                    $matukhoa[] = $tukhoas->tukhoa_id;
                }
            }
            $tukhoahanghoa->deleteAll(['hanghoa_id'=>$this->id]);
            $tukhoa->deleteAll(['id'=>$matukhoa]);
        }
        $anhdaidien = $this->findOne($this->id);
        if ($anhdaidien && file_exists($anhdaidien->anhdaidien))
            unlink($anhdaidien->anhdaidien);
        $hinhanh = new hinhanh();
        $paths = $hinhanh->findAll(['hanghoa_id'=>$this->id]);
        if ($paths)
        {
            foreach ($paths as $path)
            {
                if(file_exists($path['path']))
                    unlink($path['path']);
            }
        }
        $hinhanh->deleteAll(['hanghoa_id'=>$this->id]);
        return parent::beforeDelete();
    }

    public static function outStatus($status)
    {
        switch ($status) {
                    case 'conhang':
                        return 'Còn Hàng';
                        break;  
                    default:
                        return 'Hết Hàng';
                        break;
                }
    }
     public function getPrice()
    {
        return $this->giaban;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
}
