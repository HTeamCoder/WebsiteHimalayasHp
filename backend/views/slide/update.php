<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\slide */

$this->title = Yii::t('app', 'Cập nhật slide: ') . ' ' . $model->tieude;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tieude, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật');
?>
<div class="slide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'slide'=>$slide,
        'path'=>$slide->getUrl_image($model),
    ]) ?>

</div>
