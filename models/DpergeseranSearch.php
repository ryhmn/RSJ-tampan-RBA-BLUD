<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dpergeseran;

/**
 * DpergeseranSearch represents the model behind the search form of `app\models\Dpergeseran`.
 */
class DpergeseranSearch extends Dpergeseran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail_pergeseran_id', 'pergeseran_id', 'detail_belanja_id', 'jumlah_belanja', 'satuan_id'], 'integer'],
            [['harga_belanja'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dpergeseran::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'detail_pergeseran_id' => $this->detail_pergeseran_id,
            'pergeseran_id' => $this->pergeseran_id,
            'detail_belanja_id' => $this->detail_belanja_id,
            'harga_belanja' => $this->harga_belanja,
            'jumlah_belanja' => $this->jumlah_belanja,
            'satuan_id' => $this->satuan_id,
        ]);

        return $dataProvider;
    }
}
