<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallecompra;

/**
 * DetallecompraSearch represents the model behind the search form of `app\models\Detallecompra`.
 */
class DetallecompraSearch extends Detallecompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Lenteterm_id', 'Lentesterm_id', 'Accesorios_id', 'Aro_id', 'Compras_id', 'Mobyequipo_id'], 'integer'],
            [['Cantidad', 'Precio_compra', 'Total'], 'number'],
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
        $query = Detallecompra::find();

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
            'Precio_compra' => $this->Precio_compra,
            'Total' => $this->Total,
            'Lenteterm_id' => $this->Lenteterm_id,
            'Lentesterm_id' => $this->Lentesterm_id,
            'Accesorios_id' => $this->Accesorios_id,
            'Aro_id' => $this->Aro_id,
            'Compras_id' => $this->Compras_id,
            'Mobyequipo_id' => $this->Mobyequipo_id,
        ]);

        return $dataProvider;
    }
}
