<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $item_id
 * @property string $nama_item
 *
 * @property DetailBelanja[] $detailBelanjas
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_item'], 'required'],
            [['nama_item'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'nama_item' => 'Nama Item',
        ];
    }

    /**
     * Gets query for [[DetailBelanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class, ['item_id' => 'item_id']);
    }
}
