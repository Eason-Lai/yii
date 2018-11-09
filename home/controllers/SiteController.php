<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/10/31
 * Time: 10:31
 */

namespace home\controllers;


use home\models\PasswordResetRequestForm;
use home\models\ResetPasswordForm;
use home\models\SignupForm;
use home\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use home\models\LoginForm;

class SiteController extends Controller
{
    public function actionIndex(){
        $data=[
            'name'=>'张三'
        ];
       return $this->render('index',$data);
    }
    public function actionAbout(){
        return $this->render('about');
    }
    public function actionLogin(){
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $model=new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goHome();
            //echo $model->username.'密码:'.$model->password.'记住我'.$model->rememberMe;
        }else{
            return $this->render('login',['model'=>$model]);
        }

    }
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user=$model->signup()) {
                if(Yii::$app->getUser()->login($user)){
                    return $this->goHome();
                }
                // form inputs are valid, do something here
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goBack();
        //return $this->render('logout');
    }

    public function actionRequestPasswordReset()
    {
        $model=new PasswordResetRequestForm();
        if($model->load(Yii::$app->request->post())&& $model->validate()){
            if($model->sendEmail()){
                Yii::$app->session->setFlash('sud','发送到邮箱');
                return $this->goHome();
            }else Yii::$app->session->setFlash('失败','没发送到邮箱');        }
        return $this->render('requestPasswordResetToken',['model'=>$model]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        }catch (InvalidParamException $e){
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post())&&$model->validate()&&$model->resetPassword()){
            Yii::$app->session->setFlash('提示','修改成功');
            return $this->goHome();
        }
        return $this->render('resetPassword',['model'=>$model]);
    }
}