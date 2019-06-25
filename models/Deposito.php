<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Deposito".
 *
 * @property int $id
 * @property string $Nodocumento
 * @property double $Monto
 * @property string $Fecha
 * @property int $Empleado_id
 * @property int $Bancos_id
 *
 * @property Bancos $bancos
 * @property Empleado $empleado
 */
class Deposito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Deposito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Monto'], 'number'],
            [['Fecha'], 'safe'],
            [['Empleado_id', 'Bancos_id'], 'integer'],
            [['Nodocumento'], 'string', 'max' => 75],
            [['Bancos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bancos::className(), 'targetAttribute' => ['Bancos_id' => 'id']],
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
            'Nodocumento' => 'Nodocumento',
            'Monto' => 'Monto',
            'Fecha' => 'Fecha',
            'Empleado_id' => 'Empleado ID',
            'Bancos_id' => 'Bancos ID',
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
}
