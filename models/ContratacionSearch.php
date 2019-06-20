<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contratacion;

/**
 * ContratacionSearch represents the model behind the search form of `app\models\Contratacion`.
 */
class ContratacionSearch extends Contratacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Encargado_id'], 'integer'],
            [['Fechai', 'Fechaf', 'Contrato'], 'safe'],
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
        $query = Contratacion::find();

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
            'Encargado_id' => $this->Encargado_id,
            'Fechai' => $this->Fechai,
            'Fechaf' => $this->Fechaf,
        ]);

        $query->andFilterWhere(['like', 'Contrato', $this->Contrato])
            ->andFilterWhere(['like', 'Fechai', $this->Fechai])
            ->andFilterWhere(['like', 'Fechaf', $this->Fechaf])
            ->andFilterWhere(['like', 'Encargado_id', $this->Encargado_id]);

        return $dataProvider;
    }
}
