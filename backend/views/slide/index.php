<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý Slide');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Thêm mới Slide'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Hiển thị <strong>{begin}</strong> -> <strong>{end}</strong> của <strong>{count}</strong> slide",
        'emptyText'=>'<p class="text-center"><strong class="text-danger">Không tìm thấy kết quả nào</strong></p>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tieude',
            [
                'attribute'=>'duongdan',
                'format'=>'html',
                'filter'=>false,
                'value'=>function ($data)
                {
                    return Html::a($data->duongdan,$data->duongdan);
                }
            ],
            [
                'attribute' => 'trangthai',
                'value' => function($data){
                    if($data->trangthai == "kichhoat")
                        return "Kích hoạt";
                    return "Trì hoãn";
                },
                'filter' => Html::activeDropDownList($searchModel,'trangthai',\yii\helpers\ArrayHelper::map([
                    ['id' => 'kichhoat', 'name' => 'Kích hoạt'], ['id' => 'trihoan', 'name' => 'Trì hoãn'],
                ],'id','name'),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
