<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendapatan;

/**
 * PendapatanSearch represents the model behind the search form of `app\models\Pendapatan`.
 */
class PendapatanSearch extends Pendapatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pendapatan_id', 'rba_id', 'parent_pendapatan_id'], 'integer'],
            [['sumber_pendapatan'], 'safe'],
            [['jumlah_pendapatan'], 'number'],
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
        $query = Pendapatan::find();

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
            'pendapatan_id' => $this->pendapatan_id,
            'rba_id' => $this->rba_id,
            'parent_pendapatan_id' => $this->parent_pendapatan_id,
            'jumlah_pendapatan' => $this->jumlah_pendapatan,
        ]);

        $query->andFilterWhere(['like', 'sumber_pendapatan', $this->sumber_pendapatan]);

        return $dataProvider;
    }
}
