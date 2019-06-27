<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receta;

/**
 * RecetaSearch represents the model behind the search form of `app\models\Receta`.
 */
class RecetaSearch extends Receta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Esfera_OD', 'Esfera_OI', 'Eje_OD', 'Eje_OI', 'Cilindro_OD', 'Cilindro_OI', 'Cliente_id'], 'integer'],
            [['Fecha', 'Adicion_OD', 'Adicion_OI'], 'safe'],
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
        $query = Receta::find();

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
            'Esfera_OD' => $this->Esfera_OD,
            'Esfera_OI' => $this->Esfera_OI,
            'Eje_OD' => $this->Eje_OD,
            'Eje_OI' => $this->Eje_OI,
            'Cilindro_OD' => $this->Cilindro_OD,
            'Cilindro_OI' => $this->Cilindro_OI,
            'Cliente_id' => $this->Cliente_id,
        ]);

        $query->andFilterWhere(['like', 'Adicion_OD', $this->Adicion_OD])
            ->andFilterWhere(['like', 'Adicion_OI', $this->Adicion_OI]);

        return $dataProvider;
    }
}
