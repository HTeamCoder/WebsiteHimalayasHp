<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HanghoaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý hàng hóa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanghoa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Thêm mới hàng hóa'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Hiển thị <strong>{begin}</strong> -> <strong>{end}</strong> của <strong>{count}</strong> sản phẩm",
        'emptyText'=>'<p class="text-center"><strong class="text-danger">Không tìm thấy kết quả nào</strong></p>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tenhang',
            [
                'attribute' => 'tinhtrang',
                'value' => function($data){
                    if($data->tinhtrang=='conhang')
                        return "Còn hàng";return "Hết hàng";},
                'filter' => Html::activeDropDownList($searchModel,'tinhtrang',\yii\helpers\ArrayHelper::map([
                        ['id' => 'conhang', 'name' => 'Còn hàng'], ['id' => 'hethang', 'name' => 'Hết hàng'],
                    ],'id','name'),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute'=>'giaban',
                'value'=>function($model){
                    return ($model->giaban)?number_format($model->giaban, 0, '','.').' VND':'Liên hệ';
                },
                'filter'=>false,
            ],
            [
                'attribute'=>'loaihang_id',
                'value'=>function($model){
                    return $model->loaihang->tenloai;
                },
                'filter' => Html::activeDropDownList($searchModel,'loaihang_id',\yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute'=>'thuonghieu_id',
                'value'=>function($model){
                    return $model->thuonghieu->ten;
                },
                'filter' => Html::activeDropDownList($searchModel,'thuonghieu_id',\yii\helpers\ArrayHelper::map(\common\models\thuonghieu::find()->all(),'id','ten'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute'=>'nhacungcap_id',
                'value'=>function($model){
                    return $model->nhacungcap->tennhacungcap;
                },
                'filter' => Html::activeDropDownList($searchModel,'nhacungcap_id',\yii\helpers\ArrayHelper::map(\common\models\nhacungcap::find()->all(),'id','tennhacungcap'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute'=>'giacanhtranh',
                'value' => function($model){
                    return ($model->giacanhtranh)?number_format($model->giacanhtranh, 0, '','.').' VND':'Liên hệ';
                 },
                'filter'=>false,
            ],
            [
                'attribute'=>'soluong',
                'value'=>function($model){
                    if (!$model->soluong)
                       return 0;
                    return $model->soluong;
                },
                'filter'=>false,
            ],
            [
                'attribute'=>'anhdaidien',
                'format' => 'html',
                'value'=>function ($model) {
                    return ($model->anhdaidien&&file_exists($model->anhdaidien))?Html::img(\Yii::$app->request->BaseUrl.'/'.$model->anhdaidien, ['width'=>'50','height'=>'50','style'=>'margin:0 5px;']):'Đang cập nhật';
                },
            ],
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]);
    ?>

</div>
