<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pergeseran".
 *
 * @property int $pergeseran_id
 * @property int $rba_id
 * @property string $tanggal_pergeseran
 * @property string $keterangan
 * @property string $status
 *
 * @property DetailPergeseran[] $detailPergeserans
 * @property Rba $rba
 */
class Pergeseran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pergeseran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rba_id', 'tanggal_pergeseran', 'keterangan', 'status'], 'required'],
            [['rba_id'], 'integer'],
            [['tanggal_pergeseran'], 'safe'],
            [['keterangan', 'status'], 'string'],
            [['rba_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rba::class, 'targetAttribute' => ['rba_id' => 'rba_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pergeseran_id' => 'Pergeseran ID',
            'rba_id' => 'Rba ID',
            'tanggal_pergeseran' => 'Tanggal Pergeseran',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[DetailPergeserans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPergeserans()
    {
        return $this->hasMany(DetailPergeseran::class, ['pergeseran_id' => 'pergeseran_id']);
    }

    /**
     * Gets query for [[Rba]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRba()
    {
        return $this->hasOne(Rba::class, ['rba_id' => 'rba_id']);
    }
}
