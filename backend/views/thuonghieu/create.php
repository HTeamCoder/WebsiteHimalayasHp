<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\thuonghieu */

$this->title = Yii::t('app', 'Thêm mới thương hiệu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Thương hiệu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuonghieu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
