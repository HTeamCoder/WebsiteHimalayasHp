<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\nhacungcap */

$this->title = $model->tennhacungcap;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nhà cung cấp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhacungcap-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Xóa bỏ'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Bạn có chắc chắn muốn xóa nhà cung cấp '.$model->tennhacungcap.' này không ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tennhacungcap',
            [
                'attribute'=>'diachi',
                'format'=>'html',
                'value'=>$model->diachi,
            ],
            'sodienthoai',
            'email:email',
        ],
    ]) ?>

</div>
