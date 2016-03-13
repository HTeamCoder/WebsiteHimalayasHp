<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\loaihang vvcghfghfghxv*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loaihang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenloai')->textInput(['maxlength' => true])->label('Tên loại'. Html::tag('span', '*',['class'=>'required'])) ?>
<!--    --><?//= Html::active ?>
    <?= $form->field($model, 'nhomloaihang')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'),['prompt'=>'Chọn loại hàng']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
