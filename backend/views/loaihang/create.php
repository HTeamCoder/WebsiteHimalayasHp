<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\loaihang */

$this->title = Yii::t('app', 'Create Loaihang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loaihangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loaihang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
