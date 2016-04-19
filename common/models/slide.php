<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "{{%slide}}".
 *
 * @property integer $id
 * @property string $tieude
 * @property string $duongdan
 * @property string $trangthai
 * @property string $noidung
 *
 * @property Hinhanhslide[] $hinhanhslides
 */
class slide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slide}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tieude', 'duongdan','trangthai'], 'required'],
            ['tieude','unique'],
            [['trangthai', 'noidung'], 'string'],
            [['tieude'], 'string', 'max' => 500],
            [['duongdan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tieude' => Yii::t('app', 'Tiêu đề'),
            'duongdan' => Yii::t('app', 'Đường dẫn'),
            'trangthai' => Yii::t('app', 'Trạng thái'),
            'noidung' => Yii::t('app', 'Nội dung'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHinhanhslides()
    {
        return $this->hasMany(hinhanhslide::className(), ['slide_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SlideQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlideQuery(get_called_class());
    }

    public function afterSave($insert,$changedAttributes){
        $hinhanh = new hinhanhslide();
        $hinhanh->file = UploadedFile::getInstances($hinhanh,'file');
        if ($hinhanh->file)
        {
            foreach ($hinhanh->file as $key=>$val)
            {
                $val->saveAs('uploads/slide/'.time().'-'.substr(sha1($key+1),0,10).'.'.$val->extension);
                $hinhanh1 = new hinhanhslide();
                $hinhanh1->path = 'uploads/slide/'.time().'-'.substr(sha1($key+1),0,10).'.'.$val->extension;
                $hinhanh1->slide_id = $this->id;
                $hinhanh1->save(false);
            }
        }

        return parent::afterSave($insert,$changedAttributes);
    }
    public function beforeDelete()
    {
        $hinhanh = new hinhanhslide();
        $paths = $hinhanh->findAll(['slide_id'=>$this->id]);
        if ($paths)
        {
            foreach ($paths as $path)
            {
                if(file_exists($path['path']))
                    unlink($path['path']);
            }
        }
        $hinhanh->deleteAll(['slide_id'=>$this->id]);
        return parent::beforeDelete();
    }
}
