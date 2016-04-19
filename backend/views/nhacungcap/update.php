<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\nhacungcap */

$this->title = Yii::t('app', 'Cập nhật nhà cung cấp: ') . ' ' . $model->tennhacungcap;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nhà cung cấp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tennhacungcap, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật');
?>
<div class="nhacungcap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
