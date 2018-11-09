<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/1
 * Time: 15:25
 */

namespace home\models;


use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property mixed auth_key
 * @property integer id
 * @property string  username
 * @property string email
 * @property string password_reset_token
 * @property string password_hash
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED=0;
    const STATUS_ACTIVE=10;
    public static function findIdentity($id)
    {
        return static::findOne($id);
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
        // TODO: Implement getId() method.
    }

    public function getAuthKey()
    {
        return $this->auth_key;
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey()===$authKey;
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username,'status'=>self::STATUS_ACTIVE]);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password_hash);
    }
    // 密码加密
    public function setPassword($password)
    {
       $this->password_hash=Yii::$app->security->generatePasswordHash($password);
    }
    // 写入认证密匙
    public function generateAthkey()
    {
        $this->auth_key=Yii::$app->security->generateRandomKey();
    }

    /**
     * 判断命令牌是否为空
     * @param $token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if(empty($token)){
            return false;
        }
        return true;
    }

    /**
     * 产生命令牌
     * @throws \yii\base\Exception
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token=Yii::$app->security->generateRandomString();
    }

    public static function findByPasswordResetToken($token)
    {
        return self::findOne([
            'password_reset_token'=>$token,
            'status'=>self::STATUS_ACTIVE,
        ]);
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token=null;
    }
}