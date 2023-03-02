<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bidang".
 *
 * @property int $bidang_id
 * @property string $nama_bidang
 *
 * @property User[] $users
 */
class Bidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bidang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_bidang'], 'required'],
            [['nama_bidang'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bidang_id' => 'Bidang ID',
            'nama_bidang' => 'Nama Bidang',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['bidang_id' => 'bidang_id']);
    }
}
