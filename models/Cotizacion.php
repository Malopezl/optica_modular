<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cotizacion".
 *
 * @property int $id
 * @property string $Encargado
 * @property string $Fecha
 * @property double $Total
 * @property string $Detalles
 * @property string $Nodocumento
 *
 * @property Detallecotizacion[] $detallecotizacions
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cotizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Total'], 'number'],
            [['Detalles'], 'string'],
            [['Encargado', 'Nodocumento'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Encargado' => 'Encargado',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Detalles' => 'Detalles',
            'Nodocumento' => 'Nodocumento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecotizacions()
    {
        return $this->hasMany(Detallecotizacion::className(), ['Cotizacion_id' => 'id']);
    }
}
