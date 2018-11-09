<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/10/31
 * Time: 10:51
 */

use home\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
$this->beginPage();
?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>调用资源</title>
    <?php $this->head();?>
</head>
<body>
<?php $this->beginBody();?>
<?php
NavBar::begin([
        //设置导航栏属性
        'options'=>[
                'class'=>'navbar-inverse'
                //'class'=>'navbar-inverse navbar-fixed-top'
        ]
]);
$menuItems=[
        ['label'=>'Home','url'=>['/site/index']],
        ['label'=>'About','url'=>['/site/about']]
];
//是不是游客
if(Yii::$app->user->isGuest){
    $menuItems[]=['label'=>'登录','url'=>['/site/login']];
    $menuItems[]=['label'=>'注册','url'=>['/site/signup']];
}else{
    $menuItems[]=['label'=>'注销','url'=>['/site/logout']];
}
echo Nav::widget([
        //设置导航属性
        'options'=>['class'=>'navbar-nav'],
        'items'=>$menuItems
]);
NavBar::end();
?>
<div class="myContent">
<?php echo $content;?>
    <?=\home\widgets\Alert::widget()?>
</div>
<?php $this->endBody();?>
</body>
</html>
<?php $this->endPage();?>
