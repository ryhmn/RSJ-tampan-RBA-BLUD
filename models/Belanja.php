<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "belanja".
 *
 * @property int $belanja_id
 * @property int $rba_id
 * @property int $jenis_belanja_id
 * @property float $pagu_indikatif
 *
 * @property DetailBelanja[] $detailBelanjas
 * @property JenisBelanja $jenisBelanja
 * @property Rba $rba
 */
class Belanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rba_id', 'jenis_belanja_id', 'pagu_indikatif'], 'required'],
            [['rba_id', 'jenis_belanja_id'], 'integer'],
            [['pagu_indikatif'], 'number'],
            [['rba_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rba::class, 'targetAttribute' => ['rba_id' => 'rba_id']],
            [['jenis_belanja_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBelanja::class, 'targetAttribute' => ['jenis_belanja_id' => 'jenis_belanja_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'belanja_id' => 'Belanja ID',
            'rba_id' => 'Rba ID',
            'jenis_belanja_id' => 'Jenis Belanja ID',
            'pagu_indikatif' => 'Pagu Indikatif',
        ];
    }

    /**
     * Gets query for [[DetailBelanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class, ['belanja_id' => 'belanja_id']);
    }

    /**
     * Gets query for [[JenisBelanja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBelanja()
    {
        return $this->hasOne(JenisBelanja::class, ['jenis_belanja_id' => 'jenis_belanja_id']);
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
