<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagopbanco;

/**
 * PagopbancoSearch represents the model behind the search form of `app\models\Pagopbanco`.
 */
class PagopbancoSearch extends Pagopbanco
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Empleado_id', 'Proveedores_id', 'Bancos_id'], 'integer'],
            [['No_cheque', 'Nodocumento', 'Fecha'], 'safe'],
            [['Monto'], 'number'],
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
        $query = Pagopbanco::find();

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
            'Monto' => $this->Monto,
            'Empleado_id' => $this->Empleado_id,
            'Proveedores_id' => $this->Proveedores_id,
            'Bancos_id' => $this->Bancos_id,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'No_cheque', $this->No_cheque])
            ->andFilterWhere(['like', 'Nodocumento', $this->Nodocumento]);

        return $dataProvider;
    }
}
