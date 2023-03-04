<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property int $bidang_id
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Bidang $bidang
 * @property DetailBelanja[] $detailBelanjas
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'bidang_id'], 'required'],
            [['bidang_id'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['bidang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bidang::class, 'targetAttribute' => ['bidang_id' => 'bidang_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'bidang_id' => 'Bidang ID',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[Bidang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBidang()
    {
        return $this->hasOne(Bidang::class, ['bidang_id' => 'bidang_id']);
    }

    public function getNamaBidang()
    {
        return $this->bidang->nama_bidang;
    }

    /**
     * Gets query for [[DetailBelanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class, ['user_id' => 'user_id']);
    }

    /**
     * Beginning of login proccess
     * 
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::find()->where(['user_id' => $id])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->one();
    }

    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Beginning of create user proccess
     */
    public function createUser()
    {
        $this->password = \Yii::$app->security->generatePasswordHash($this->password);
        $this->auth_key = \Yii::$app->security->generateRandomString();
        $this->access_token = \Yii::$app->security->generateRandomString();

        if ($this->save()) {
            return true;
        }

        \Yii::error("User wasn't saved. ", VarDumper::dumpAsString($this->errors));
        return false;
    }

    public function updateUser()
    {
        $this->password = \Yii::$app->security->generatePasswordHash($this->password);

        if ($this->save()) {
            return true;
        }

        \Yii::error("User wasn't updated. ", VarDumper::dumpAsString($this->errors));
        return false;
    }
}
