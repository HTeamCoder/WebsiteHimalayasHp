<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * This is the model class for table "{{%hinhanh}}".
 *
 * @property integer $id jgjhgjhg
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
            [['file'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 10,'maxSize'=>1024*1024],
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
        $path_img = hinhanh::find()->where(['hanghoa_id' => $data->id])->all();
        foreach ($path_img as $img)
        {
            if (file_exists($img['path']))
                if (Yii::$app->controller->action->id != 'view')
                $string_path .= Html::tag('div',Html::tag('div',Html::img(\Yii::$app->request->BaseUrl.'/'.$img['path'], ['width'=>'150','height'=>'150']).Html::a(Html::tag('i','',['class'=>'glyphicon glyphicon-remove delete-img']),Url::to(['hanghoa/deleteimage','id'=>$img['id'],'hanghoa_id'=>$img['hanghoa_id']]),['title'=>'Xóa']),['class'=>'box-image']),['class'=>'wrap-image']);
                else
                 $string_path .= Html::img(\Yii::$app->request->BaseUrl.'/'.$img['path'], ['width'=>'150','height'=>'150','style'=>'margin:0 5px;']);   
        }
        return $string_path;
    }
}
