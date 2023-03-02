<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satuan".
 *
 * @property int $satuan_id
 * @property string $nama_satuan
 *
 * @property DetailBelanja[] $detailBelanjas
 * @property DetailPergeseran[] $detailPergeserans
 */
class Satuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'satuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_satuan'], 'required'],
            [['nama_satuan'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'satuan_id' => 'Satuan ID',
            'nama_satuan' => 'Nama Satuan',
        ];
    }

    /**
     * Gets query for [[DetailBelanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class, ['satuan_id' => 'satuan_id']);
    }

    /**
     * Gets query for [[DetailPergeserans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPergeserans()
    {
        return $this->hasMany(DetailPergeseran::class, ['satuan_id' => 'satuan_id']);
    }
}
