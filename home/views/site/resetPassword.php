<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/4
 * Time: 10:26
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
?>
<?php $form= ActiveForm::begin(['id'=>'reset-password-form'])?>
<?=$form->field($model,'password')->passwordInput(['autofocus'=>true])?>
<div class="form-group">
    <?=Html::submitButton('保存',['class'=>'btn btn-primary'])?>
</div>
<?php ActiveForm::end()?>
