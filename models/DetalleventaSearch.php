<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleventa;

/**
 * DetalleventaSearch represents the model behind the search form of `app\models\Detalleventa`.
 */
class DetalleventaSearch extends Detalleventa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Venta_id', 'Accesorios_id', 'Aro_id'], 'integer'],
            [['Cantidad', 'Descuento', 'Total'], 'number'],
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
        $query = Detalleventa::find();

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
            'Cantidad' => $this->Cantidad,
            'Venta_id' => $this->Venta_id,
            'Accesorios_id' => $this->Accesorios_id,
            'Aro_id' => $this->Aro_id,
            'Descuento' => $this->Descuento,
            'Total' => $this->Total,
        ]);

        return $dataProvider;
    }
}
