<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập hệ thống HimalayasHP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Vui lòng điền đầy đủ thông tin dưới đây để đăng nhập hệ thống:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Nhập tên đăng nhập'])->label('Tên đăng nhập'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Nhập mật khẩu'])->label('Mật khẩu'. Html::tag('span', ' *',['class'=>'text-danger'])) ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Ghi nhớ đăng nhập') ?>

                <div class="form-group">
                    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
