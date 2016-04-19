<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */

$this->title = Yii::t('app', 'Cập nhật hàng hóa :') . ' ' . $model->tenhang;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hàng hóa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tenhang, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật hàng hóa');
?>
<div class="hanghoa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hinhanh'=>$hinhanh,
        'path'=>$hinhanh->getUrl_image($model),
        'tukhoa'=>$tukhoa,
    ]) ?>
</div>
