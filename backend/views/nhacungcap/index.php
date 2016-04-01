<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\nhacungcapsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Danh sách nhà cung cấp');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhacungcap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Nhà cung cấp'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'ten',
//            [
//                'attribute'=>'Nhà cung cấp',
////                'format'=>'html',
//                'value'=>function($data){
//                    return $data->ten;
//                },
//
//            ],
            'dia_chi',
            'email:email',
            'so_dien_thoai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
