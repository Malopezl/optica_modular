<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pagopbanco".
 *
 * @property int $id
 * @property string $No_cheque
 * @property double $Monto
 * @property string $Nodocumento
 * @property int $Empleado_id
 * @property int $Proveedores_id
 * @property int $Bancos_id
 * @property string $Fecha
 *
 * @property Bancos $bancos
 * @property Empleado $empleado
 * @property Proveedores $proveedores
 */
class Pagopbanco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Pagopbanco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha','Monto','Proveedores_id','Bancos_id','No_cheque','Nodocumento'],'required'],
            [['Monto'], 'number'],
            [['Empleado_id', 'Proveedores_id', 'Bancos_id'], 'integer'],
            [['Fecha'], 'safe'],
            [['No_cheque', 'Nodocumento'], 'string', 'max' => 100],
            [['Bancos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bancos::className(), 'targetAttribute' => ['Bancos_id' => 'id']],
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
            'No_cheque' => 'No. de Cheque',
            'Monto' => 'Monto',
            'Nodocumento' => 'Nodocumento',
            'Empleado_id' => 'Empleado',
            'Proveedores_id' => 'Proveedor',
            'Bancos_id' => 'Banco',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBancos()
    {
        return $this->hasOne(Bancos::className(), ['id' => 'Bancos_id']);
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
