<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Compras".
 *
 * @property int $id
 * @property string $Fecha
 * @property string $Nodocumeto
 * @property double $Total
 * @property double $Contado
 * @property double $Credito
 * @property string $Comprascol
 * @property int $Empleado_id
 * @property int $Proveedores_id
 *
 * @property Empleado $empleado
 * @property Proveedores $proveedores
 * @property Detallecompra[] $detallecompras
 * @property Entrada[] $entradas
 */
class Compras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Total', 'Contado', 'Credito'], 'number'],
            [['Empleado_id', 'Proveedores_id'], 'integer'],
            [['Nodocumeto'], 'string', 'max' => 50],
            [['Comprascol'], 'string', 'max' => 45],
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
            'id' => 'ID',
            'Fecha' => 'Fecha',
            'Nodocumeto' => 'Nodocumeto',
            'Total' => 'Total',
            'Contado' => 'Contado',
            'Credito' => 'Credito',
            'Comprascol' => 'Comprascol',
            'Empleado_id' => 'Empleado ID',
            'Proveedores_id' => 'Proveedores ID',
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
    public function getProveedores()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'Proveedores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecompras()
    {
        return $this->hasMany(Detallecompra::className(), ['Compras_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['Compras_id' => 'id']);
    }
}
