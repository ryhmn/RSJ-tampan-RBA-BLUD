<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_belanja".
 *
 * @property int $detail_belanja_id
 * @property int $user_id
 * @property int $belanja_id
 * @property int $item_id
 * @property int $jumlah_belanja
 * @property int $satuan_id
 * @property float $harga_satuan
 *
 * @property DetailPergeseran[] $detailPergeserans
 * @property Item $item
 * @property Satuan $satuan
 * @property User $user
 */
class Dbelanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'belanja_id', 'item_id', 'jumlah_belanja', 'satuan_id', 'harga_satuan'], 'required'],
            [['user_id', 'belanja_id', 'item_id', 'jumlah_belanja', 'satuan_id'], 'integer'],
            [['harga_satuan'], 'number'],
            [['satuan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Satuan::class, 'targetAttribute' => ['satuan_id' => 'satuan_id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::class, 'targetAttribute' => ['item_id' => 'item_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_belanja_id' => 'Detail Belanja ID',
            'user_id' => 'User ID',
            'belanja_id' => 'Belanja ID',
            'item_id' => 'Item ID',
            'jumlah_belanja' => 'Jumlah Belanja',
            'satuan_id' => 'Satuan ID',
            'harga_satuan' => 'Harga Belanja',
        ];
    }

    /**
     * Gets query for [[DetailPergeserans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPergeserans()
    {
        return $this->hasMany(DetailPergeseran::class, ['detail_belanja_id' => 'detail_belanja_id']);
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::class, ['item_id' => 'item_id']);
    }

    /**
     * Gets query for [[Satuan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSatuan()
    {
        return $this->hasOne(Satuan::class, ['satuan_id' => 'satuan_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }
}
