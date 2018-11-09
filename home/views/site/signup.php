<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model home\models\SignupForm */
/* @var $form ActiveForm */
?>
<div class="signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ->textInput(['autofocus'=>true])?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- signup -->
