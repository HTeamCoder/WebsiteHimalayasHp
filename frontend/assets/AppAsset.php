<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
	public $sourcePath = '@bower/gifty/';
    public $css = [
        'css/style.css',
		'css/jquery.countdown.css',
		'css/megamenu.css',
        'css/etalage.css',
        'css/amazingslider-1.css',
    ];
    public $js = [
		'js/jquery.easydropdown.js',
		'js/responsiveslides.min.js',
		'js/jquery.countdown.js',
		'js/script.js',
		'js/megamenu.js',
		'js/jquery.flexisel.js',
        'js/jquery.etalage.min.js',
        'js/amazingslider.js',
        'js/initslider-1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
