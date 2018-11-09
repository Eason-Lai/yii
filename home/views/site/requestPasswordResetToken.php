<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/3
 * Time: 10:24
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
?>
<?php $form=ActiveForm::begin(['id'=>'request-password-form']);?>

<?=$form->field($model,'email')->textInput(['autoFocus'=>true]);?>
<div class="form-group">
    <?=Html::submitButton('发送',['class'=>'btn btn-primary'])?>
</div>
<?php ActiveForm::end();?>

