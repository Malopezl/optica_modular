<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleado;

/**
 * EmpleadoSearch represents the model behind the search form of `app\models\Empleado`.
 */
class EmpleadoSearch extends Empleado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Edad', 'Estado_civil','Estado', 'Sexo','Profesion_id', 'Cargo_id'], 'integer'],
            [['Nombre', 'Nit', 'Telefono', 'Telefono2', 'Correo_Electronico', 'Correo_electronico2', 'Direccion', 'Fecha_Nacimiento', 'No_licencia', 'Cv'], 'safe'],
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
        $query = Empleado::find();

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
            'Fecha_Nacimiento' => $this->Fecha_Nacimiento,
            'Edad' => $this->Edad,
            'Estado_civil' => $this->Estado_civil,
            'Profesion_id' => $this->Profesion_id,
            'Cargo_id' => $this->Cargo_id,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Nit', $this->Nit])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Telefono2', $this->Telefono2])
            ->andFilterWhere(['like', 'Correo_Electronico', $this->Correo_Electronico])
            ->andFilterWhere(['like', 'Correo_electronico2', $this->Correo_electronico2])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'No_licencia', $this->No_licencia])
            ->andFilterWhere(['like', 'Cv', $this->Cv])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
