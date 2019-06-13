<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orden;

/**
 * OrdenSearch represents the model behind the search form of `app\models\Orden`.
 */
class OrdenSearch extends Orden
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Receta_id', 'Lentei_id', 'Lented_id', 'Aro_id', 'Venta_id', 'Entregada', 'Lista', 'Finalizada'], 'integer'],
            [['No_Caja', 'Fecha_Entrega', 'Anotaciones'], 'safe'],
            [['Descuento', 'Total'], 'number'],
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
        $query = Orden::find();

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
            'Receta_id' => $this->Receta_id,
            'Lentei_id' => $this->Lentei_id,
            'Lented_id' => $this->Lented_id,
            'Aro_id' => $this->Aro_id,
            'Venta_id' => $this->Venta_id,
            'Fecha_Entrega' => $this->Fecha_Entrega,
            'Descuento' => $this->Descuento,
            'Entregada' => $this->Entregada,
            'Lista' => $this->Lista,
            'Total' => $this->Total,
            'Finalizada' => $this->Finalizada,
        ]);

        $query->andFilterWhere(['like', 'No_Caja', $this->No_Caja])
            ->andFilterWhere(['like', 'Anotaciones', $this->Anotaciones]);

        return $dataProvider;
    }
}
