<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mobyequipo;

/**
 * MobyequipoSearch represents the model behind the search form of `app\models\Mobyequipo`.
 */
class MobyequipoSearch extends Mobyequipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Existencia', 'Depreciacion_id'], 'integer'],
            [['Descripcion', 'fechaCompra'], 'safe'],
            [['Precio_compra', 'Precio_venta'], 'number'],
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
        $query = Mobyequipo::find();

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
            'fechaCompra' => $this->fechaCompra,
            'Precio_compra' => $this->Precio_compra,
            'Existencia' => $this->Existencia,
            'Depreciacion_id' => $this->Depreciacion_id,
            'Precio_venta' => $this->Precio_venta,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
