<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */

$this->title = $model->tenhang;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hàng hóa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->tenhang;
?>
<div class="hanghoa-view">

    <h1><?= Html::encode($model->tenhang) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa bỏ'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa hàng hóa '.$model->tenhang.' này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id','tenhang',
            'duongdan',
            [
                'attribute'=>'tinhtrang',
                'value'=>$model->outStatus($model->tinhtrang),
            ],
            'tomtat:html',
            'mota:html',
            [
                'attribute'=>'giaban',
                'value'=>number_format($model->giaban, 0, '','.').' VND',
            ],
            [
                'attribute'=>'giacanhtranh',
                'value'=>number_format($model->giacanhtranh, 0, '','.').' VND',
            ],
            [
                'attribute'=>'loaihang_id',
                'value'=>$model->loaihang->tenloai,
            ],
            'mahang',
            [
                'attribute'=>'thuonghieu_id',
                'value'=>$model->thuonghieu->ten,
            ],
            [
                'attribute'=>'nhacungcap_id',
                'value'=>$model->nhacungcap->tennhacungcap,
            ],
            [
                'attribute'=>'anhdaidien',
                'label'=>'Hình ảnh minh họa',
                'format' => 'html',
                'value'=> ($model->anhdaidien && file_exists($model->anhdaidien))?Html::img(\Yii::$app->request->BaseUrl.'/'.$model->anhdaidien, ['width'=>'150','height'=>'150','style'=>'margin:0 5px;']):'Đang cập nhật',
            ],
            [
				'attribute'=>'hinhanhs',
				'label'=>'Danh sách hình ảnh',
                'format' => 'html',
				'value'=> ($hinhanh->getUrl_image($model)!= '')?$hinhanh->getUrl_image($model):'Đang cập nhật',
            ],
            [
                'attribute'=>'tukhoas',
                'label'=>'Từ khóa',
                'format' => 'html',
                'value'=> $model->tagLinks,
            ],
        ],
    ]) ?>


</div>
