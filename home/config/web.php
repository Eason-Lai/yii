<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/10/31
 * Time: 10:40
 */

$params= require(__DIR__ . '/params.php');
$config=[
    'id'=>'app-home',
    'basePath'=>dirname(__DIR__),
    'vendorPath'=> dirname(dirname(__DIR__)) . '/vendor',
    //gii2 配置引导
    'bootstrap'=>['debug','gii'],
    'modules'=>[
      'debug'=>[
          'class'=>'yii\debug\Module'
      ],
        'gii'=>[
            'class'=>'yii\gii\Module'
        ]
    ],
    'aliases'=>[
        '@home'=>dirname(__DIR__),
        '@assets'=>dirname(dirname(__DIR__)).'/assets',
    ],
    'controllerNamespace'=>'home\controllers',
    //'layout'=>null,
    'components'=>[
        'assetManager'=>[
            'basePath'=>'@webroot/web',
            'baseUrl'=>'@web/web'
        ],
        'request'=>[
            'cookieValidationKey'=>'Emmmm'
        ],
        'user'=>[
            'identityClass'=>'home\models\User',
            //是否使用cookie和全局变量
            'enableAutoLogin'=>true,
        ],
        //配置数据库链接
        'db'=>[
            'class'=>'yii\db\Connection',
            'dsn'=>'mysql:host=localhost;dbname=myyii',
            'username'=>'root',
            'password'=>'970703',
            'charset'=>'utf8',
        ],
        'mailer'=>[
          'class'=>'yii\swiftmailer\Mailer',
          'useFileTransport'=>false,
          'transport'=>[
              'class'=>'Swift_SmtpTransport',
              'host'=>'smtp.163.com',
              'username'=>'15130503571@163.com',
              'password'=>'ld970703',
              'port'=>'25',
              'encryption' => 'tls',
          ],
        ],
    ],
    'params'=>$params,
];
//引导配置
//$config['bootstrap'][]='debug';
////指定模块
//$config['modules']['debug']=[
//    'class'=>'yii\debug\Module'
//];
////在引导里面设置一个脚手架
//$config['bootstrap'][]='gii';
////设置模块
//$config['modules']['gii']=[
//    'class'=>'yii\gii\Module'
//];
return $config;