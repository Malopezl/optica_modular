<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entrada;

/**
 * EntradaSearch represents the model behind the search form of `app\models\Entrada`.
 */
class EntradaSearch extends Entrada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Aro_id', 'Accesorios_id', 'Lentesterm_id', 'Lenteterm_id', 'Mobyequipo_id', 'Cantidad'], 'integer'],
            [['Nodocumento', 'Encargado', 'Fecha'], 'safe'],
            [['Precio'], 'number'],
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
        $query = Entrada::find();

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
            'Aro_id' => $this->Aro_id,
            'Accesorios_id' => $this->Accesorios_id,
            'Lentesterm_id' => $this->Lentesterm_id,
            'Lenteterm_id' => $this->Lenteterm_id,
            'Mobyequipo_id' => $this->Mobyequipo_id,
            'Cantidad' => $this->Cantidad,
            'Precio' => $this->Precio,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Nodocumento', $this->Nodocumento])
            ->andFilterWhere(['like', 'Encargado', $this->Encargado]);

        return $dataProvider;
    }
}
