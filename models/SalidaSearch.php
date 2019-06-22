<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salida;

/**
 * SalidaSearch represents the model behind the search form of `app\models\Salida`.
 */
class SalidaSearch extends Salida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Cantidad', 'Mobyequipo_id', 'Lenteterm_id', 'Lentesterm_id', 'Accesorios_id', 'Aro_id', 'Empleado_id'], 'integer'],
            [['Fecha', 'Encargado', 'Nodocumento'], 'safe'],
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
        $query = Salida::find();

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
            'Cantidad' => $this->Cantidad,
            'Mobyequipo_id' => $this->Mobyequipo_id,
            'Lenteterm_id' => $this->Lenteterm_id,
            'Lentesterm_id' => $this->Lentesterm_id,
            'Accesorios_id' => $this->Accesorios_id,
            'Aro_id' => $this->Aro_id,
            'Empleado_id' => $this->Empleado_id,
        ]);

        $query->andFilterWhere(['like', 'Encargado', $this->Encargado])
            ->andFilterWhere(['like', 'Nodocumento', $this->Nodocumento]);

        return $dataProvider;
    }
}
