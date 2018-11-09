<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/1
 * Time: 0:51
 */

namespace home\assets;


use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath='@webroot';
    public $baseUrl='@web/web';
    public $css=[
        'site.css'
    ];
    public $js=[];
    public $depends=[
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}