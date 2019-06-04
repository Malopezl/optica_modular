<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lentesterm;

/**
 * LentestermSearch represents the model behind the search form of `app\models\Lentesterm`.
 */
class LentestermSearch extends Lentesterm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Graduacion_base', 'Existencia', 'Material_id', 'Tipo_id'], 'integer'],
            [['Precio_compra', 'Porcentaje_ganancia', 'Precio_venta'], 'number'],
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
        $query = Lentesterm::find();

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
            'Graduacion_base' => $this->Graduacion_base,
            'Precio_compra' => $this->Precio_compra,
            'Porcentaje_ganancia' => $this->Porcentaje_ganancia,
            'Existencia' => $this->Existencia,
            'Material_id' => $this->Material_id,
            'Tipo_id' => $this->Tipo_id,
            'Precio_venta' => $this->Precio_venta,
        ]);

        return $dataProvider;
    }
}
