<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NhacungcapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý nhà cung cấp');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhacungcap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Thêm mới nhà cung cấp'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Hiển thị <strong>{begin}</strong> -> <strong>{end}</strong> của <strong>{count}</strong> nhà cung cấp",
        'emptyText'=>'<p class="text-center"><strong class="text-danger">Không tìm thấy kết quả nào</strong></p>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tennhacungcap',
            [
                'attribute'=>'diachi',
                'format'=>'html',
                'value'=>function($data)
                {
                    return $data->diachi;
                },
                'filter'=>false,
            ],
            [
                'attribute'=>'sodienthoai',
                'value' => function($data){
                    return ($data->sodienthoai)?$data->sodienthoai:'Liên hệ';
                },
                'filter'=>false,
            ],
            [
                'attribute'=>'email',
                'format'=>'email',
                'value' => function($data){
                    return ($data->email)?$data->email:'Liên hệ';
                },
                'filter'=>false,
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
