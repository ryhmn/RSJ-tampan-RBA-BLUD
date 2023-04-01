<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_belanja".
 *
 * @property int $jenis_belanja_id
 * @property int $parent_jenis_belanja_id
 * @property string $jenis_belanja
 *
 * @property Belanja[] $belanjas
 */
class JenisBelanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_jenis_belanja_id', 'jenis_belanja'], 'required'],
            [['parent_jenis_belanja_id'], 'integer'],
            [['jenis_belanja'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jenis_belanja_id' => 'Jenis Belanja ID',
            'parent_jenis_belanja_id' => 'Parent Jenis Belanja ID',
            'jenis_belanja' => 'Jenis Belanja',
        ];
    }

    /**
     * Gets query for [[Belanjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBelanjas()
    {
        return $this->hasMany(Belanja::class, ['jenis_belanja_id' => 'jenis_belanja_id']);
    }
}
