<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Receta".
 *
 * @property int $id
 * @property string $Fecha
 * @property int $Esfera_OD
 * @property int $Esfera_OI
 * @property int $Eje_OD
 * @property int $Eje_OI
 * @property int $Cilindro_OD
 * @property int $Cilindro_OI
 * @property string $Adicion_OD
 * @property string $Adicion_OI
 * @property int $Cliente_id
 *
 * @property Orden[] $ordens
 * @property Cliente $cliente
 */
class Receta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Receta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha','Cliente_id'],'required'],
            [['Fecha'], 'safe'],
            [['Esfera_OD', 'Esfera_OI', 'Eje_OD', 'Eje_OI', 'Cilindro_OD', 'Cilindro_OI', 'Cliente_id'], 'integer'],
            [['Adicion_OD', 'Adicion_OI'], 'string', 'max' => 15],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fecha' => 'Fecha',
            'Esfera_OD' => 'Esfera Ojo Derecho',
            'Esfera_OI' => 'Esfera Ojo Izquierdo',
            'Eje_OD' => 'Eje Ojo Derecho',
            'Eje_OI' => 'Eje Ojo Izquierdo',
            'Cilindro_OD' => 'Cilindro Ojo Derecho',
            'Cilindro_OI' => 'Cilindro Ojo Izquierdo',
            'Adicion_OD' => 'Adicion Ojo Derecho',
            'Adicion_OI' => 'Adicion Ojo Izquierdo',
            'Cliente_id' => 'Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::className(), ['Receta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'Cliente_id']);
    }
}
