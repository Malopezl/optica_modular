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
            'Esfera_OD' => 'Esfera Od',
            'Esfera_OI' => 'Esfera Oi',
            'Eje_OD' => 'Eje Od',
            'Eje_OI' => 'Eje Oi',
            'Cilindro_OD' => 'Cilindro Od',
            'Cilindro_OI' => 'Cilindro Oi',
            'Adicion_OD' => 'Adicion Od',
            'Adicion_OI' => 'Adicion Oi',
            'Cliente_id' => 'Cliente ID',
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
