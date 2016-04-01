<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hàng hóa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanghoa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Chỉnh sửa'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa hàng hóa này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenhang',
            'duongdan',
            'tinhtrang',
            'giaban',
            'giacanhtranh',
            'tomtat:ntext',
            'mota:ntext',
            'loaihang_id',
            'loaihang.tenloai',
            'mahang',
            'thuonghieu_id',
            'thuonghieu.ten',
            'hinhanh_id'
        ],
    ]) ?>

</div>
