<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/3
 * Time: 1:42
 */

namespace home\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username','required'],
            // 去除尾部空格
            ['username','filter','filter'=>'trim'],
            // 限制长度
            ['username','string','min'=>2,'max'=>10],
            //唯一性限制
            ['username','unique','targetClass'=>'home\models\User','message'=>'用户名已存在'],

            ['email','required'],
            ['email','email'],
            ['email','filter','filter'=>'trim'],
            ['email','unique','targetClass'=>'home\models\User','message'=>'邮箱已注册'],

            ['password','required'],
        ];
        //return parent::rules(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return [
            'username'=>'用户名：',
            'email'=>'电子邮件：',
            'password'=>'密码：',
        ];
        //return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }
    public function signup()
    {
        if(!$this->validate()){
            return null;
        }
        $user=new User();
        $user->username=$this->username;
        $user->email=$this->email;
        $user->setPassword($this->password);
        $user->generateAthkey();
        return $user->save()? $user:null;
    }
}