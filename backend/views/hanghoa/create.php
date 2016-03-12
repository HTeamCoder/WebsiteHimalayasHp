<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */

$this->title = Yii::t('app', 'Thêm mới hàng hóa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hàng hóa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanghoa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'anh'=>$anh,
    ]) ?>

</div>
