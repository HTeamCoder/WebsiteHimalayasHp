<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Html;
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
    public $file;
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
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10],
//            [['path'], 'string', 'max' => 45]
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
            'file' => Yii::t('app', 'Danh sách hình ảnh'),
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
    public function getUrl_image($data)
    {
        $string_path = '';
        $path_img = hinhanh::find()->where(['hanghoa_id' => $data->id])->limit(3)->all();
        foreach ($path_img as $img)
        {
            if (file_exists($img['path']))
                $string_path .= Html::img(\Yii::$app->request->BaseUrl.'/'.$img['path'], ['width'=>'50','height'=>'50','style'=>'margin:0 5px;']);
        }
        return $string_path;
    }
}
