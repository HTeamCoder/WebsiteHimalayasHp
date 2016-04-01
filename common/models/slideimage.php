<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Html;
/**
 * This is the model class for table "yii2_slide_image".
 *
 * @property integer $id
 * @property string $path
 * @property integer $yii2_slide_id
 *
 * @property Slide $yii2Slide
 */
class slideimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_slide_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_id'], 'required'],
            [['path'], 'safe'],
            [['slide_id'], 'integer'],
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
            'path' => Yii::t('app', 'Path'),
            'slide_id' => Yii::t('app', 'Yii2 Slide ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYii2Slide()
    {
        return $this->hasOne(Slide::className(), ['id' => 'slide_id']);
    }

    /**
     * @inheritdoc
     * @return SlideImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlideImageQuery(get_called_class());
    }
    public function getUrl_image($data)
    {
        $string_path = '';
        $path_img = hinhanh::find()->where(['hanghoa_id' => $data->id])->limit(10)->all();
        foreach ($path_img as $img) {
            if (file_exists($img['path']))
                $string_path .= Html::img(\Yii::$app->request->BaseUrl . '/' . $img['path'], ['width' => '50', 'height' => '50', 'style' => 'margin:0 5px;']);
        }
        return $string_path;
    }
}
