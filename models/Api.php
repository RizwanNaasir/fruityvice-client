<?php


namespace common\models;


use yii\db\ActiveRecord;

use yii\web\IdentityInterface;

class Api extends ActiveRecord implements IdentityInterface

{

    public static function tableName()

    {

        return 'user_rest_api';

    }


    public function validatePassword($username, $password)

    {

        // Use default validating or define yourself

        return md5($password) === self :: findByUsername($username)['password'];

    }

    public static function findByUsername($username)

    {

        return static::findOne(['username' => $username]);

    }


    public static function findIdentity($id)

    {

        return static::findOne($id);

    }


    public static function findIdentityByAccessToken($token, $type = null)

    {

        return static::findOne(['token' => $token]);

    }


    public function getId()

    {

        return $this->id;

    }


    public function getAuthKey()

    {

        return $this->authKey;

    }


    public function validateAuthKey($authKey)

    {

        return $this->authKey === $authKey;

    }

}