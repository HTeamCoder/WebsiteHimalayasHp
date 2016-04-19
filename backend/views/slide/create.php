<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\slide */

$this->title = Yii::t('app', 'Thêm mới Slide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'slide'=>$slide,
    ]) ?>

</div>
