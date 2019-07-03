<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Venta".
 *
 * @property int $id
 * @property string $Nodocumento
 * @property string $Fecha
 * @property double $Total
 * @property double $Credito
 * @property double $Contado
 * @property int $Cliente_id
 * @property string $Encargado
 * @property int $Finalizada
 * @property int $Entregada
 * @property int $Empleado_id
 *
 * @property Detalleventa[] $detalleventas
 * @property Orden[] $ordens
 * @property Cliente $cliente
 * @property Empleado $empleado
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha','Cliente_id','Empleado_id'],'required'],
            [['Fecha'], 'safe'],
            [['Total', 'Credito', 'Contado'], 'number'],
            [['Cliente_id', 'Finalizada', 'Entregada', 'Empleado_id'], 'integer'],
            [['Empleado_id','Cliente_id','Fecha','Nodocumento'], 'required'],
            [['Nodocumento', 'Encargado'], 'string', 'max' => 100],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
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
            'Nodocumento' => 'No de documento',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Credito' => 'Credito',
            'Contado' => 'Contado',
            'Cliente_id' => 'Cliente',
            'Encargado' => 'Encargado',
            'Finalizada' => 'Finalizada',
            'Entregada' => 'Entregada',
            'Empleado_id' => 'Encargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['Venta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::className(), ['Venta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'Cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'Empleado_id']);
    }
}
