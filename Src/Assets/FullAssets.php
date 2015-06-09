<?php
namespace UEditor\Assets;

use yii\web\AssetBundle;

class FullAssets extends AssetBundle
{
    public $sourcePath = '@vendor/rogeecn/yii2-ueditor/assets/ueditor1_4_3-utf8-php';

    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
}