<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallenomina;

/**
 * DetallenominaSearch represents the model behind the search form of `app\models\Detallenomina`.
 */
class DetallenominaSearch extends Detallenomina
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Nomina_id', 'Empleado_id'], 'integer'],
            [['Horas_extra', 'bonos_extra', 'B_incentivo', 'Sub_total', 'Igss_total', 'Isr_total', 'D_extra', 'T_descuentos', 'T_percibido'], 'number'],
            [['T_devengado'], 'safe'],
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
        $query = Detallenomina::find();

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
            'Horas_extra' => $this->Horas_extra,
            'bonos_extra' => $this->bonos_extra,
            'B_incentivo' => $this->B_incentivo,
            'Sub_total' => $this->Sub_total,
            'Igss_total' => $this->Igss_total,
            'Isr_total' => $this->Isr_total,
            'D_extra' => $this->D_extra,
            'T_descuentos' => $this->T_descuentos,
            'T_percibido' => $this->T_percibido,
            'Nomina_id' => $this->Nomina_id,
            'Empleado_id' => $this->Empleado_id,
        ]);

        $query->andFilterWhere(['like', 'T_devengado', $this->T_devengado]);

        return $dataProvider;
    }
}
