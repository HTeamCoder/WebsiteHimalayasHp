<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "{{%hinhanh}}".
 *
 * @property integer $id
 * @property integer $hanghoa_id
 * @property string $path
 *
 * @property Hanghoa $hanghoa
 */
class hinhanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hinhanh}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hanghoa_id', 'path'], 'required'],
            [['hanghoa_id'], 'integer'],
            [['path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['path'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hanghoa_id' => Yii::t('app', 'Hanghoa ID'),
            'path' => Yii::t('app', 'Path'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoa()
    {
        return $this->hasOne(Hanghoa::className(), ['id' => 'hanghoa_id']);
    }

    /**
     * @inheritdoc
     * @return HinhanhQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HinhanhQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}
