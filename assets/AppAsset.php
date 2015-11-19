<?php
namespace file\assets;

use yii\web\AssetBundle;

/**
* @author Arron.y <yangyun48142@gmail.com>
* @since 2.0
*/
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}