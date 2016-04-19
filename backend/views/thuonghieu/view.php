<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\thuonghieu */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Thương hiệu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->ten;
?>
<div class="thuonghieu-view">

    <h1><?= Html::encode($model->ten) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa bỏ'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa thương hiệu '.$model->ten.' này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
        ],
    ]) ?>

</div>
