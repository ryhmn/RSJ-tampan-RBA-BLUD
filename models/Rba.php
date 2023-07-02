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

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $transaction = static::getDb()->beginTransaction();
            try {
                // Find the related "Belanja" records with matching "rba_id"
                $belanjaRecords = Belanja::findAll(['rba_id' => $this->rba_id]);

                foreach ($belanjaRecords as $belanjaRecord) {
                    // Find the related "DetailBelanja" records with matching "belanja_id"
                    $detailBelanjaRecords = DetailBelanja::findAll(['belanja_id' => $belanjaRecord->belanja_id]);

                    foreach ($detailBelanjaRecords as $detailBelanjaRecord) {
                        // Find the related "DetailPergeseran" records with matching "detail_belanja_id"
                        $detailPergeseranRecords = DetailPergeseran::findAll(['detail_belanja_id' => $detailBelanjaRecord->detail_belanja_id]);

                        foreach ($detailPergeseranRecords as $detailPergeseranRecord) {
                            // Find the related "Pergeseran" record with matching "pergeseran_id"
                            $pergeseranRecord = Pergeseran::findOne(['pergeseran_id' => $detailPergeseranRecord->pergeseran_id]);

                            if ($pergeseranRecord) {
                                // Delete the related "Pergeseran" record
                                $pergeseranRecord->delete();
                            }
                        }

                        // Delete the related "DetailBelanja" record
                        $detailBelanjaRecord->delete();
                    }

                    // Delete the related "Belanja" record
                    $belanjaRecord->delete();
                }

                $transaction->commit();
                return true;
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
        }

        return false;
    }
}
