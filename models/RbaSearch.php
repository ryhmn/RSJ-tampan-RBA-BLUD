<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rba;

/**
 * RbaSearch represents the model behind the search form of `app\models\Rba`.
 */
class RbaSearch extends Rba
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rba_id'], 'integer'],
            [['rba_tahun'], 'safe'],
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
        $query = Rba::find();

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
            'rba_id' => $this->rba_id,
            'rba_tahun' => $this->rba_tahun,
        ]);

        return $dataProvider;
    }
}
