<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisBelanja;

/**
 * JenisBelanjaSearch represents the model behind the search form of `app\models\JenisBelanja`.
 */
class JenisBelanjaSearch extends JenisBelanja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_belanja_id', 'parent_jenis_belanja_id'], 'integer'],
            [['jenis_belanja'], 'safe'],
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
        $query = JenisBelanja::find();

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
            'jenis_belanja_id' => $this->jenis_belanja_id,
            'parent_jenis_belanja_id' => $this->parent_jenis_belanja_id,
        ]);

        $query->andFilterWhere(['like', 'jenis_belanja', $this->jenis_belanja]);

        return $dataProvider;
    }
}
