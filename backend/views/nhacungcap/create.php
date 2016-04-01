<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\nhacungcap */

$this->title = Yii::t('app', 'Create Nhà cung cấp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Danh sách nhà cung cấp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhacungcap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
