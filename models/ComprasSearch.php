<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compras;

/**
 * ComprasSearch represents the model behind the search form of `app\models\Compras`.
 */
class ComprasSearch extends Compras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Empleado_id', 'Proveedores_id'], 'integer'],
            [['Fecha', 'Nodocumeto', 'Comprascol'], 'safe'],
            [['Total', 'Contado', 'Credito'], 'number'],
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
        $query = Compras::find();

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
            'Contado' => $this->Contado,
            'Credito' => $this->Credito,
            'Empleado_id' => $this->Empleado_id,
            'Proveedores_id' => $this->Proveedores_id,
        ]);

        $query->andFilterWhere(['like', 'Nodocumeto', $this->Nodocumeto])
            ->andFilterWhere(['like', 'Comprascol', $this->Comprascol]);

        return $dataProvider;
    }
}
