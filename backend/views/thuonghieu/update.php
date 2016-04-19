<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\thuonghieu */

$this->title = Yii::t('app', 'Cập nhật thương hiệu : ') . ' ' . $model->ten;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Thương hiệu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật');
?>
<div class="thuonghieu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
