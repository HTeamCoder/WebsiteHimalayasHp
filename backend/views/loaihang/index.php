<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LoaihangSearchgggggg */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý loại hàng');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loaihang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Thêm loại hàng mới'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Hiển thị <strong>{begin}</strong> -> <strong>{end}</strong> của <strong>{count}</strong> loại hàng",
        'emptyText'=>'<p class="text-center"><strong class="text-danger">Không tìm thấy kết quả nào</strong></p>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'tenloai',
                'filter'=>false,
            ],
            [
                'attribute'=>'nhomloaihang',
                'value'=>function($model){
                    if (!$model->nhomloaihang)
                        return '';
                    return $model->nhomloaihang0->tenloai;
                },
                'filter' => Html::activeDropDownList($searchModel,'nhomloaihang',\yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
