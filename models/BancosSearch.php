<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bancos;

/**
 * BancosSearch represents the model behind the search form of `app\models\Bancos`.
 */
class BancosSearch extends Bancos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Bancosn_id'], 'integer'],
            [['No_cuenta', 'Nombre_b', 'Tipo_cuenta'], 'safe'],
            [['Total'], 'number'],
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
        $query = Bancos::find();

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
            'id' => $this->id,
            'Total' => $this->Total,
            'Bancosn_id' => $this->Bancosn_id,
        ]);

        $query->andFilterWhere(['like', 'No_cuenta', $this->No_cuenta])
            ->andFilterWhere(['like', 'Nombre_b', $this->Nombre_b])
            ->andFilterWhere(['like', 'Tipo_cuenta', $this->Tipo_cuenta]);

        return $dataProvider;
    }
}
