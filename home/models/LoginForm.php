<?php

namespace home\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;
    private $_user;

    private $_a=true;
//    /**
//     * @inheritdoc
//     */
//    public static function tableName()
//    {
//        return 'user';
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
              [['username','password'], 'required'],
              ['rememberMe','boolean'],
              ['password','validatePassword'],
//            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
//            [['status', 'created_at', 'updated_at'], 'integer'],
//            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
//            [['auth_key'], 'string', 'max' => 32],
//            [['username'], 'unique'],
//            [['email'], 'unique'],
//            [['password_reset_token'], 'unique'],
        ];
    }
    public function validatePassword($att,$params){
        $user=$this->getUser();
        if(!$user || !$user->validatePassword($this->password)){
            //$this->_a=false;
            //Yii::$app->session->setFlash('错误提示','用户名或密码错误');
            $this->addError($att,"用户名或密码错误");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password'=>'密码',
            'rememberMe'=>'记住我',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function login()
    {
        if($this->validate()){
            return Yii::$app->user->login($this->getUser(),$this->rememberMe?3600*24*30:0);
        }else{
            return false;
        }
//        $user=User::findOne(['username'=>$this->username]);
//        if(is_null($user)){
//            Yii::$app->session->setFlash('错误提示','用户名或密码错误');
//            //$this->addError('username',"用户名错误");
//            return false;
//        }else{
//            if(Yii::$app->security->validatePassword($this->password,$user->password_hash)
//                && Yii::$app->user->login($user)){
//                return true;
//            }else{
//                Yii::$app->session->setFlash('错误提示','用户名或密码错误');
//                //$this->addError('password',"密码错误");
//                return false;
//            }
//        }
    }

    public function getUser()
    {
        if($this->_user===null){
            $this->_user=User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
