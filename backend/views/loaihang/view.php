<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\loaihangssss */

$this->title = $model->tenloai;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loại hàng'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->tenloai;
?>
<div class="loaihang-view">

    <h1><?= Html::encode($model->tenloai) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa bỏ'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa loại hàng '.$model->tenloai.' này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenloai',
            'duongdan',
            [
                'attribute'=>'nhomloaihang',
                'value'=>($model->nhomloaihang)?$model->nhomloaihang0->tenloai:'',
            ],
        ],
    ]) ?>

</div>
