<?php
namespace UEditor\Assets;

use yii\web\AssetBundle;

class MiniAssets extends AssetBundle
{
    public $sourcePath = '@vendor/rogeecn/yii2-ueditor/assets/umeditor1_2_2-utf8-php';

    public $js = [
        'umeditor.config.js',
        'umeditor.min.js',
    ];
    public $css=[
        'themes/default/css/umeditor.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}