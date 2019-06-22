<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form of `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Cliente_id', 'Finalizada', 'Entregada', 'Empleado_id'], 'integer'],
            [['Nodocumento', 'Fecha', 'Encargado'], 'safe'],
            [['Total', 'Credito', 'Contado'], 'number'],
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
        $query = Venta::find();

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
            'Total' => $this->Total,
            'Credito' => $this->Credito,
            'Contado' => $this->Contado,
            'Cliente_id' => $this->Cliente_id,
            'Finalizada' => $this->Finalizada,
            'Entregada' => $this->Entregada,
            'Empleado_id' => $this->Empleado_id,
        ]);

        $query->andFilterWhere(['like', 'Nodocumento', $this->Nodocumento])
            ->andFilterWhere(['like', 'Encargado', $this->Encargado]);

        return $dataProvider;
    }
}
