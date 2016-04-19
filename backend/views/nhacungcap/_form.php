<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\nhacungcap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhacungcap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tennhacungcap')->textInput(['maxlength' => true,'placeholder'=>'Nhập tên nhà cung cấp'])->label('Tên nhà cung cấp'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

    <?=
    $form->field($model, 'diachi')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ])->label('Địa chỉ'. Html::tag('span', ' *',['class'=>'text-danger']));
    ?>

    <?= $form->field($model, 'sodienthoai')->textInput(['maxlength' => true,'placeholder'=>'Nhập số điện thoại']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Nhập email của bạn'])->label('Email'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Chỉnh sửa'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
