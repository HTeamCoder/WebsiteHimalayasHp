<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form" >

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tieu_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList([ 'hienthi' => 'Hiển thị', 'khonghienthi' => 'Không hiển thị', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'noi_dung')->textarea(['rows' => 6]) ?>

    <?php
    echo $form->field($hinhanh, 'path[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*','multiple' => true],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
