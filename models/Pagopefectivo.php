<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pagopefectivo".
 *
 * @property int $Caja_id
 * @property int $id
 * @property double $Monto
 * @property int $Empleado_id
 * @property string $Nodocumento
 * @property int $Proveedores_id
 * @property string $Fecha
 *
 * @property Caja $caja
 * @property Empleado $empleado
 * @property Proveedores $proveedores
 */
class Pagopefectivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Pagopefectivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Caja_id', 'Empleado_id', 'Proveedores_id'], 'integer'],
            [['Monto'], 'number'],
            [['Fecha'], 'safe'],
            [['Nodocumento'], 'string', 'max' => 75],
            [['Caja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Caja::className(), 'targetAttribute' => ['Caja_id' => 'id']],
            [['Empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['Empleado_id' => 'id']],
            [['Proveedores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['Proveedores_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Caja_id' => 'Caja ID',
            'id' => 'ID',
            'Monto' => 'Monto',
            'Empleado_id' => 'Empleado ID',
            'Nodocumento' => 'Nodocumento',
            'Proveedores_id' => 'Proveedores ID',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaja()
    {
        return $this->hasOne(Caja::className(), ['id' => 'Caja_id']);
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
    public function getProveedores()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'Proveedores_id']);
    }
}
