<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aro;

/**
 * AroSearch represents the model behind the search form of `app\models\Aro`.
 */
class AroSearch extends Aro
{
    /**
     * {@inheritdoc}
     */
    public $material;
    public $marca;
    public function rules()
    {
        return [
            [['id', 'Material_id', 'Marca_id', 'Existencia'], 'integer'],
            [['Precio_compra', 'Porcentaje_ganancia', 'Precio_venta'], 'number'],
            [['Codigo', 'marca', 'material'], 'safe'],
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
        $query = Aro::find();
        $query->joinWith('marca', 'material');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['material'] = [
            'asc' => ['Materiala.Nombre' => SORT_ASC],
            'desc' => ['Materiala.Nombre' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['marca'] = [
            'asc' => ['Marca.Nombre' => SORT_ASC],
            'desc' => ['Marca.Nombre' => SORT_DESC],
        ];

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
            'Porcentaje_ganancia' => $this->Porcentaje_ganancia,
            'Precio_venta' => $this->Precio_venta,
            'Material_id' => $this->Material_id,
            'Marca_id' => $this->Marca_id,
            'Existencia' => $this->Existencia,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo]);
        $query->andFilterWhere(['like', 'Marca.Nombre', $this->marca]);
        $query->andFilterWhere(['like', 'Materiala.Nombre', $this->material]);
        return $dataProvider;
    }
}
