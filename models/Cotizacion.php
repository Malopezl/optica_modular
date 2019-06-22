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
 * @property int $Empleado_id
 *
 * @property Empleado $empleado
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
            [['Empleado_id','Fecha','Nodocumento'], 'required'],
            [['Empleado_id'], 'integer'],
            [['Encargado', 'Nodocumento'], 'string', 'max' => 100],
            [['Empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['Empleado_id' => 'id']],
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
            'Nodocumento' => 'No de documento',
            'Empleado_id' => 'Encargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'Empleado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecotizacions()
    {
        return $this->hasMany(Detallecotizacion::className(), ['Cotizacion_id' => 'id']);
    }
}
