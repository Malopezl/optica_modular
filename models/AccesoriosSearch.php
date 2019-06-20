<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accesorios;

/**
 * AccesoriosSearch represents the model behind the search form of `app\models\Accesorios`.
 */
class AccesoriosSearch extends Accesorios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Existencia'], 'integer'],
            [['Nombre', 'Descripcion'], 'safe'],
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
        $query = Accesorios::find();

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
            'Precio_compra' => $this->Precio_compra,
            'Existencia' => $this->Existencia,
            'Porcentaje_ganancia' => $this->Porcentaje_ganancia,
            'Precio_venta' => $this->Precio_venta,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
