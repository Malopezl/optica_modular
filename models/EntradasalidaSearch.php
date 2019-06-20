<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entradasalida;

/**
 * EntradasalidaSearch represents the model behind the search form of `app\models\Entradasalida`.
 */
class EntradasalidaSearch extends Entradasalida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Estado', 'Empleado_id'], 'integer'],
            [['Fecha'], 'safe'],
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
        $query = Entradasalida::find();

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
            'Fecha' => $this->Fecha,
            'Estado' => $this->Estado,
            'Empleado_id' => $this->Empleado_id,
        ]);

        return $dataProvider;
    }
}
