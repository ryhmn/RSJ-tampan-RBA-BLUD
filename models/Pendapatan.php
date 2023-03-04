<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendapatan".
 *
 * @property int $pendapatan_id
 * @property int $rba_id
 * @property int $parent_pendapatan_id
 * @property string $sumber_pendapatan
 * @property float $jumlah_pendapatan
 *
 * @property Rba $rba
 */
class Pendapatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendapatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rba_id', 'parent_pendapatan_id', 'sumber_pendapatan', 'jumlah_pendapatan'], 'required'],
            [['rba_id', 'parent_pendapatan_id'], 'integer'],
            [['jumlah_pendapatan'], 'number'],
            [['sumber_pendapatan'], 'string', 'max' => 120],
            [['rba_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rba::class, 'targetAttribute' => ['rba_id' => 'rba_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pendapatan_id' => 'Pendapatan ID',
            'rba_id' => 'Rba ID',
            'parent_pendapatan_id' => 'Parent Pendapatan ID',
            'sumber_pendapatan' => 'Sumber Pendapatan',
            'jumlah_pendapatan' => 'Jumlah Pendapatan',
        ];
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
