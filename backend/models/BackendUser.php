<?php

namespace backend\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "backend_users".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property string|null $authkey
 * @property string|null $accessToken
 */
class BackendUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%backend_users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'authkey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'accessToken' => 'Access Token',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authkey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authkey===$authKey;
    }

    public function validatePassword($password)
    {
        return ($this->password == $password)?true:false;
    }

    public static function findByLogin($login)
    {
        return BackendUser::find()->where(['login' => $login])->one();
    }
}
