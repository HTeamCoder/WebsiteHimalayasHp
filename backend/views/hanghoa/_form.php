<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tenhang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tinhtrang')->dropDownList([ 'conhang' => 'Còn hàng', 'hethang' => 'Hết hàng', ], ['prompt' => 'Tình trạng hàng hóa']) ?>

    <?= $form->field($model, 'giaban')->textInput() ?>

    <?= $form->field($model, 'giacanhtranh')->textInput() ?>

    <?= $form->field($anh, 'path')->fileInput() ?>

    <?= $form->field($model, 'tomtat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mota')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'loaihang_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'),['prompt'=>'Chọn loại hàng']) ?>

    <?= $form->field($model, 'mahang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thuonghieu_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\thuonghieu::find()->all(),'id','ten'),['prompt'=>'Chọn thương hiệu']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
