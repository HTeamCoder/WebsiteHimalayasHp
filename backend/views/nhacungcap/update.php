<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\nhacungcap */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nhà cung cấp',
]) . ' ' . $model->ten;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Danh sách nhà cung cấp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->ten]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nhacungcap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
