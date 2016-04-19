<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tieude')->textInput(['maxlength' => true,'placeholder'=>'Nhập tên nhà cung cấp'])->label('Tiêu đề'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'duongdan')->textInput(['maxlength' => true,'placeholder'=>'Nhập đường dẫn'])->label('Đường dẫn'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'trangthai')->dropDownList([ 'kichhoat' => 'Kích hoạt', 'trihoan' => 'Trì hoãn', ], ['prompt' => 'Chọn trạng thái'])->label('Trạng thái'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

    <?= $form->field($slide, 'file[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*','multiple' => true],
    ])->label('Danh sách hình ảnh'. Html::tag('span', ' *',['class'=>'text-danger']));?>
    <?=
    (isset($path))?Html::tag('div',$path,['id'=>'list-image']):'';
    ?>
    <?=
    $form->field($model, 'noidung')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
            'clientOptions' => [
                'filebrowserUploadUrl' => 'ckeditor/url'
            ],
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
