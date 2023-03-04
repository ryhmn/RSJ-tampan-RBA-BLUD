<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dbelanja;

/**
 * DbelanjaSearch represents the model behind the search form of `app\models\Dbelanja`.
 */
class DbelanjaSearch extends Dbelanja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail_belanja_id', 'user_id', 'belanja_id', 'item_id', 'jumlah_belanja', 'satuan_id'], 'integer'],
            [['harga_satuan'], 'number'],
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
        $query = Dbelanja::find();

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
            'detail_belanja_id' => $this->detail_belanja_id,
            'user_id' => $this->user_id,
            'belanja_id' => $this->belanja_id,
            'item_id' => $this->item_id,
            'jumlah_belanja' => $this->jumlah_belanja,
            'satuan_id' => $this->satuan_id,
            'harga_satuan' => $this->harga_satuan,
        ]);

        return $dataProvider;
    }
}
