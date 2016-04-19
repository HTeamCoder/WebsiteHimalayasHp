<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'H-Team',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Tổng quan', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Quản lý danh mục', 'items'=>[
            [
                'label' => 'Loại hàng',
                'url' => Yii::$app->urlManager->createUrl('loaihang/index')
            ],
            [
                'label' => 'Thương hiệu',
                'url' => Yii::$app->urlManager->createUrl('thuonghieu/index')
            ],
            [
                'label' => 'Nhà cung cấp',
                'url' => Yii::$app->urlManager->createUrl('nhacungcap/index')
            ],
            [
                'label' => 'Slide',
                'url' => Yii::$app->urlManager->createUrl('slide/index')
            ],
            [
                'label' => 'Đơn vị tính',
                'url' => Yii::$app->urlManager->createUrl('donvitinh/index')
            ],
            
        ]

        ];
        $menuItems[] = ['label' => 'Quản lý hàng hóa','url' => Yii::$app->urlManager->createUrl('hanghoa/index')];
        $menuItems[] = ['label' => 'Quản lý đơn hàng', 'url' => Yii::$app->urlManager->createUrl('donhang/index')];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; H-Team <?= date('Y') ?></p>

        <p class="pull-right"><?= 'Powered by '.Html::a('HimalayasHP','http://himalayashp.com',['title'=>'himalayashp']) ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
