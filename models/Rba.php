<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rba".
 *
 * @property int $rba_id
 * @property string $rba_tahun
 *
 * @property Belanja[] $belanjas
 * @property Pendapatan[] $pendapatans
 * @property Pergeseran[] $pergeserans
 */
class Rba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rba_tahun'], 'required'],
            [['rba_tahun'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rba_id' => 'Rba ID',
            'rba_tahun' => 'Rba Tahun',
        ];
    }

    /**
     * Gets query for [[Belanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBelanjas()
    {
        return $this->hasMany(Belanja::class, ['rba_id' => 'rba_id']);
    }

    /**
     * Gets query for [[Pendapatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendapatans()
    {
        return $this->hasMany(Pendapatan::class, ['rba_id' => 'rba_id']);
    }

    /**
     * Gets query for [[Pergeserans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPergeserans()
    {
        return $this->hasMany(Pergeseran::class, ['rba_id' => 'rba_id']);
    }
}
