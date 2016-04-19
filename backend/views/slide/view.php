<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\slide */

$this->title = $model->tieude;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa bỏ'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa slide '.$model->tieude.' này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tieude',
            [
                'attribute'=>'duongdan',
                'format'=>'html',
                'value'=>Html::a($model->duongdan,$model->duongdan),
            ],
            'trangthai',
            'noidung:html',
            [
                'attribute'=>'hinhanhslide',
                'label'=>'Danh sách hình ảnh',
                'format' => 'html',
                'value'=> $slide->getUrl_image($model),
            ],
        ],
    ]) ?>

</div>
