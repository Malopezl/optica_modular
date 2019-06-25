<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagopefectivo;

/**
 * PagopefectivoSearch represents the model behind the search form of `app\models\Pagopefectivo`.
 */
class PagopefectivoSearch extends Pagopefectivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Caja_id', 'id', 'Empleado_id', 'Proveedores_id'], 'integer'],
            [['Monto'], 'number'],
            [['Nodocumento', 'Fecha'], 'safe'],
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
        $query = Pagopefectivo::find();

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
            'Caja_id' => $this->Caja_id,
            'id' => $this->id,
            'Monto' => $this->Monto,
            'Empleado_id' => $this->Empleado_id,
            'Proveedores_id' => $this->Proveedores_id,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Nodocumento', $this->Nodocumento]);

        return $dataProvider;
    }
}
