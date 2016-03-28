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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tenhang',
            [
                'attribute' => 'tinhtrang',
                'value' => function($data){
                    if($data->tinhtrang=='conhang')
                        return "Còn hàng";
                    return "Hết hàng";
                },
                'filter' => Html::activeDropDownList($searchModel,'tinhtrang',\yii\helpers\ArrayHelper::map(
                    [
                        ['id' => 'conhang', 'name' => 'Còn hàng'],
                        ['id' => 'hethang', 'name' => 'Hết hàng'],
                    ],'id','name'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute' => 'giaban',
                'filter'=>false
            ],
            [
                'attribute'=>'loaihang_id',
                'value'=>function($data){
                    return $data->loaihang->tenloai;
                },
            ],
            [
                'attribute'=>'thuonghieu_id',
                'value'=>'thuonghieu.ten',
                'filter' => Html::activeDropDownList($searchModel,'thuonghieu_id',\yii\helpers\ArrayHelper::map(\common\models\thuonghieu::find()->all(),'id','ten'
                ),['prompt' => 'Tất cả','class' => 'form-control']),
            ],
            [
                'attribute' => 'giacanhtranh',
                'value' => function($data){
                    return number_format($data->giacanhtranh, 0, '','.');
                },
                'filter' => false
            ],
            /*[
                'label'=>'Hình ảnh',
                'format' => 'html',
                'value'=>function ($model) {
                    $hinhanh = new \common\models\hinhanh();
                    return $hinhanh->getUrl_image($model);
                },
                'filter' => false
            ],*/
            // 'tomtat:ntext',
            // 'mota:ntext',
            // 'loaihang_id',
            // 'mahang',
            // 'thuonghieu_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
