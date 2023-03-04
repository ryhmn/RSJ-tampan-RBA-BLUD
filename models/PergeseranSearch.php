<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pergeseran;

/**
 * PergeseranSearch represents the model behind the search form of `app\models\Pergeseran`.
 */
class PergeseranSearch extends Pergeseran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pergeseran_id', 'rba_id'], 'integer'],
            [['tanggal_pergeseran', 'keterangan', 'status'], 'safe'],
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
        $query = Pergeseran::find();

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
            'pergeseran_id' => $this->pergeseran_id,
            'rba_id' => $this->rba_id,
            'tanggal_pergeseran' => $this->tanggal_pergeseran,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
