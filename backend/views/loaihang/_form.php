<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\loaihang vvcghfghfghxv*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loaihang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenloai')->textInput(['maxlength' => true,'placeholder'=>'Nhập tên loại hàng'])->label('Tên loại'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>
    <?= $form->field($model, 'nhomloaihang')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'),['prompt'=>'Chọn loại hàng']
    )->label('Nhóm loại hàng'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
