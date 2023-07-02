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
 * @property Belanja $belanja
 * @property DetailPergeseran[] $detailPergeserans
 * @property Item $item
 * @property Satuan $satuan
 * @property User $user
 */
class DetailBelanja extends \yii\db\ActiveRecord
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
            [['belanja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Belanja::class, 'targetAttribute' => ['belanja_id' => 'belanja_id']],
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
            'harga_satuan' => 'Harga Satuan',
        ];
    }

    /**
     * Gets query for [[Belanja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBelanja()
    {
        return $this->hasOne(Belanja::class, ['belanja_id' => 'belanja_id']);
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

    // Used inside action_detail_belanja_list function in detail_belanja_controller
    // Get data from detail_belanja table or detail_pergeseran
    public static function getDetailBelanjaList($cat_id)
    {
        // Counting detail_belanja records which related to detail_pergeseran table
        $countData = self::find()
            ->join('inner join',
                        'detail_pergeseran',
                        'detail_pergeseran.detail_belanja_id = detail_belanja.detail_belanja_id'
                    )
            ->where(['detail_pergeseran.detail_belanja_id' => $cat_id])
            ->count();

        $data = '';

        // If count data <= 0 then the system will get the data from detail_belanja table
        // Else, the system will get it from detail_pergeseran
        if ($countData <= 0) {
            $data = self::find()
                ->where(['detail_belanja_id' => $cat_id])
                ->one();
        } else {
            $max_id = DetailPergeseran::find()->max('pergeseran_id');
            $data = self::find()
                ->join('inner join',
                        'detail_pergeseran',
                        'detail_pergeseran.detail_belanja_id = detail_belanja.detail_belanja_id'
                    )
                ->where(['detail_pergeseran.detail_belanja_id' => $cat_id, 'detail_pergeseran.pergeseran_id' => $max_id])
                ->select(['detail_pergeseran.harga_satuan', 'detail_pergeseran.jumlah_belanja'])
                ->one();
        }

        return $data;
    }

    // Used inside action_dpd_detail_belanja in detail_belanja_controller
    public static function getDpdDetailBelanja($cat_id)
    {
        // Counting data by relations of detail_pergeseran, pergeseran, and item tables based on rba_id
        $countData = self::find()
                ->join('inner join',
                        'detail_pergeseran',
                        'detail_pergeseran.detail_belanja_id = detail_belanja.detail_belanja_id'
                    )
                ->join('inner join',
                        'pergeseran',
                        'pergeseran.pergeseran_id = detail_pergeseran.pergeseran_id'
                    )
                ->join('inner join',
                        'item',
                        'item.item_id = detail_belanja.item_id'
                    )
                ->where(['pergeseran.rba_id' => $cat_id])
                ->count();

        $data = '';

        // If counted data <= 0 then the system get the data from detail_belanja table
        // Else, will get the data from detail_pergeseran
        if ($countData <= 0) {
            $data = self::find()
                ->join('inner join',
                        'belanja',
                        'belanja.belanja_id = detail_belanja.belanja_id'
                    )
                ->join('inner join',
                        'item',
                        'item.item_id = detail_belanja.item_id'
                    )
                ->where(['belanja.rba_id' => $cat_id])
                ->all();
        } else {
            $max_id = DetailPergeseran::find()->max('pergeseran_id');
            $data = self::find()
                ->join('inner join',
                        'detail_pergeseran',
                        'detail_pergeseran.detail_belanja_id = detail_belanja.detail_belanja_id'
                    )
                ->join('inner join',
                        'pergeseran',
                        'pergeseran.pergeseran_id = detail_pergeseran.pergeseran_id'
                    )
                ->join('inner join',
                        'item',
                        'item.item_id = detail_belanja.item_id'
                    )
                ->where(['pergeseran.rba_id' => $cat_id, 'detail_pergeseran.pergeseran_id' => $max_id])
                ->select(['detail_pergeseran.*'])
                ->all();
        }

        return $data;
    }

    // Used to get satuan data list after selected an item
    public static function getDetailBelanjaSatuan($cat_id)
    {
        $data = self::find()
            ->join('inner join',
                    'satuan',
                    'satuan.satuan_id = detail_belanja.satuan_id'
                )
            ->where(['detail_belanja.detail_belanja_id' => $cat_id])
            ->select(['detail_belanja.satuan_id AS id', 'satuan.nama_satuan AS name'])
            ->asArray()
            ->all();

        return $data;
    }

    // Used to get selected satuan in update form
    public static function getDetailBelanjaSatuanUpdate($cat_id)
    {
        $data = self::find()
            ->join('inner join',
                    'satuan',
                    'satuan.satuan_id = detail_belanja.satuan_id'
                )
            ->where(['detail_belanja.detail_belanja_id' => $cat_id])
            ->indexBy('id')
            ->all();

        return $data;
    }
}
