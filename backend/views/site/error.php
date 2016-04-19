<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Không tìm thấy trang';
?>
<div class="site-error" style="background: url('<?= Yii::$app->request->baseUrl; ?>/himalaya.jpg');height: 600px;width: 100%;">

    <h1 style="padding-top:300px;font-size: 50pt;"><p class="text-center"><?= '404 NOT FOUND' ?></p></h1>
    <div class="alert alert-danger text-center">
        <h4><?= $this->title ?></h4>
    </div>
</div>
