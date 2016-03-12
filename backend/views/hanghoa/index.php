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

            'id',
            'tenhang',
            'duongdan',
            'tinhtrang',
            'giaban',
            [
                'attribute'=>'loaihang_id',
                'value'=>'loaihang.tenloai',
            ],
            [
                'attribute'=>'thuonghieu_id',
                'value'=>'thuonghieu.ten',
            ],
             'giacanhtranh',
            // 'tomtat:ntext',
            // 'mota:ntext',
            // 'loaihang_id',
            // 'mahang',
            // 'thuonghieu_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
