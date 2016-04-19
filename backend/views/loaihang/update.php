<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\loaihang ddd*/

$this->title = Yii::t('app', 'Cập nhật loại hàng : ') . ' ' . $model->tenloai;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loại hàng'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tenloai, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật');
?>
<div class="loaihang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
