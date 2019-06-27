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
    public $porcentaje;
    public $nombre;
    public function rules()
    {
        return [
            [['id', 'Existencia', 'Depreciacion_id'], 'integer'],
            [['Descripcion', 'fechaCompra', 'porcentaje', 'nombre'], 'safe'],
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
         $query->joinWith('depreciacion');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['nombre'] = [
            'asc' => ['Depreciacion.Nombre' => SORT_ASC],
            'desc' => ['Depreciacion.Nombre' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['porcentaje'] = [
            'asc' => ['Depreciacion.porcentaje' => SORT_ASC],
            'desc' => ['Depreciacion.porcentaje' => SORT_DESC],
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
            'fechaCompra' => $this->fechaCompra,
            'Precio_compra' => $this->Precio_compra,
            'Existencia' => $this->Existencia,
            'Depreciacion_id' => $this->Depreciacion_id,
            'Precio_venta' => $this->Precio_venta,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);
        $query->andFilterWhere(['like', 'Depreciacion.Nombre', $this->nombre]);
        $query->andFilterWhere(['like', 'Depreciacion.porcentaje', $this->porcentaje]);

        return $dataProvider;
    }
}
