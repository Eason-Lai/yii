<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/4
 * Time: 10:32
 */

namespace home\models;


use yii\base\InvalidParamException;
use yii\base\Model;

class ResetPasswordForm extends Model
{
    public $password;
    public $_user;

    public function __construct($token,$config = [])
    {
        if (empty($token) || !is_string($token)){
            throw new InvalidParamException('参数错误');
        }
        $this->_user=User::findByPasswordResetToken($token);
        if (!$this->_user){
            throw new InvalidParamException('还是参数错误');
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return[
            ['password','required'],
            ['password','string','min'=>6],
        ];
    }

    public function resetPassword()
    {
        $user=$this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        return $user->save();
    }
}