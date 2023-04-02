<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Belanja;

/**
 * BelanjaSearch represents the model behind the search form of `app\models\Belanja`.
 */
class BelanjaSearch extends Belanja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['belanja_id', 'rba_id', 'jenis_belanja_id'], 'integer'],
            [['pagu_indikatif'], 'number'],
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
        $query = Belanja::find();

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
            'belanja_id' => $this->belanja_id,
            'rba_id' => $this->rba_id,
            'jenis_belanja_id' => $this->jenis_belanja_id,
            'pagu_indikatif' => $this->pagu_indikatif,
        ]);

        return $dataProvider;
    }
}
