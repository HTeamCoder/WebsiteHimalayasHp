<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HanghoaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tenhang') ?>

    <?= $form->field($model, 'duongdan') ?>

    <?= $form->field($model, 'tinhtrang') ?>

    <?= $form->field($model, 'giaban') ?>

    <?php // echo $form->field($model, 'giacanhtranh') ?>

    <?php // echo $form->field($model, 'tomtat') ?>

    <?php // echo $form->field($model, 'mota') ?>

    <?php // echo $form->field($model, 'loaihang_id') ?>

    <?php // echo $form->field($model, 'mahang') ?>

    <?php // echo $form->field($model, 'thuonghieu_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
