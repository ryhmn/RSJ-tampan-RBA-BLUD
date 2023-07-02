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

    public function beforeDelete()
    {
        // if (parent::beforeDelete()) {
        //     $transaction = static::getDb()->beginTransaction();
        //     try {
        //         // Find the related "Belanja" records with matching "rba_id"
        //         $belanjaRecords = Belanja::findAll(['rba_id' => $this->rba_id]);

        //         foreach ($belanjaRecords as $belanjaRecord) {
        //             // Find the related "DetailBelanja" records with matching "belanja_id"
        //             $detailBelanjaRecords = DetailBelanja::findAll(['belanja_id' => $belanjaRecord->belanja_id]);

        //             foreach ($detailBelanjaRecords as $detailBelanjaRecord) {
        //                 // Find the related "DetailPergeseran" records with matching "detail_belanja_id"
        //                 $detailPergeseranRecords = DetailPergeseran::findAll(['detail_belanja_id' => $detailBelanjaRecord->detail_belanja_id]);

        //                 foreach ($detailPergeseranRecords as $detailPergeseranRecord) {
        //                     // Delete the related "DetailPergeseran" record
        //                     $detailPergeseranRecord->delete();
        //                 }

        //                 // Delete the related "DetailBelanja" record
        //                 $detailBelanjaRecord->delete();
        //             }

        //             // Delete the related "Belanja" record
        //             $belanjaRecord->delete();
        //         }

        //         $transaction->commit();
        //         return true;
        //     } catch (\Exception $e) {
        //         $transaction->rollBack();
        //         throw $e;
        //     }
        // }

        // return false;


        // if (parent::beforeDelete()) {
        //     $transaction = static::getDb()->beginTransaction();
        //     try {
        //         // Find the related "Belanja" records with matching "rba_id"
        //         $belanjaRecords = Belanja::findAll(['rba_id' => $this->rba_id]);

        //         foreach ($belanjaRecords as $belanjaRecord) {
        //             // Find the related "DetailBelanja" records with matching "belanja_id"
        //             $detailBelanjaRecords = DetailBelanja::findAll(['belanja_id' => $belanjaRecord->belanja_id]);

        //             foreach ($detailBelanjaRecords as $detailBelanjaRecord) {
        //                 // Find the related "DetailPergeseran" records with matching "detail_belanja_id"
        //                 $detailPergeseranRecords = DetailPergeseran::findAll(['detail_belanja_id' => $detailBelanjaRecord->detail_belanja_id]);

        //                 foreach ($detailPergeseranRecords as $detailPergeseranRecord) {
        //                     // Delete the related "DetailPergeseran" record
        //                     $detailPergeseranRecord->delete();
        //                 }

        //                 // Delete the related "DetailBelanja" record
        //                 // $detailBelanjaRecord->delete();
        //             }

        //             // Delete the related "Belanja" record
        //             // $belanjaRecord->delete();
        //         }

        //         $transaction->commit();
        //         return true;
        //     } catch (\Exception $e) {
        //         $transaction->rollBack();
        //         throw $e;
        //     }
        // }

        // return false;

        // if (parent::beforeDelete()) {
        //     $transaction = static::getDb()->beginTransaction();
        //     try {
        //         // Find the related "DetailPergeseran" record with the specified "detail_pergeseran_id"
        //         $detailPergeseranRecord = DetailPergeseran::findOne(['detail_pergeseran_id' => $this->detail_pergeseran_id]);

        //         if ($detailPergeseranRecord !== null) {
        //             // Find the related "DetailBelanja" record with matching "detail_belanja_id"
        //             $detailBelanjaRecord = DetailBelanja::findOne(['detail_belanja_id' => $detailPergeseranRecord->detail_belanja_id]);

        //             if ($detailBelanjaRecord !== null) {
        //                 // Find the related "Belanja" record with matching "belanja_id"
        //                 $belanjaRecord = Belanja::findOne(['belanja_id' => $detailBelanjaRecord->belanja_id]);

        //                 if ($belanjaRecord !== null) {
        //                     // Delete the related "DetailPergeseran" record
        //                     $detailPergeseranRecord->delete();

        //                     // Delete the related "DetailBelanja" record
        //                     // $detailBelanjaRecord->delete();

        //                     // Delete the related "Belanja" record
        //                     // $belanjaRecord->delete();
        //                 }
        //             }
        //         }

        //         $transaction->commit();
        //         return true;
        //     } catch (\Exception $e) {
        //         $transaction->rollBack();
        //         throw $e;
        //     }
        // }

        // return false;

        if (parent::beforeDelete()) {
            $transaction = static::getDb()->beginTransaction();
            try {
                // Find the related "DetailPergeseran" records with matching "pergeseran_id"
                $detailPergeseranRecords = DetailPergeseran::findAll(['pergeseran_id' => $this->pergeseran_id]);

                foreach ($detailPergeseranRecords as $detailPergeseranRecord) {
                    // Delete the related "DetailPergeseran" record
                    $detailPergeseranRecord->delete();
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
