<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/2
 * Time: 0:23
 */

use yii\bootstrap\ActiveForm;
//use yii\helpers\Html;
use yii\bootstrap\Html;
?>
<div>
    <?php $form= ActiveForm::begin()?>
    <?=$form->field($model,'username')->textInput(['autoFocus'=>true])?>
    <?=$form->field($model,'password')->passwordInput()?>
    <?=$form->field($model,'rememberMe')->checkbox()?>
    <p>
        <?=Html::a('忘了密码？',['site/request-password-reset'])?>
    </p>
    <div class="form-group">
        <?=Html::submitButton('登录',['class'=>'btn btn-primary','name'=>'login_button'])?>
    </div>
    <?php ActiveForm::end()?>
</div>
