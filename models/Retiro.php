<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Retiro".
 *
 * @property int $id
 * @property string $Fecha
 * @property string $Nodocumento
 * @property double $Monto
 * @property int $Bancos_id
 * @property int $Empleado_id
 *
 * @property Bancos $bancos
 * @property Empleado $empleado
 */
class Retiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Retiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Monto'], 'number'],
            [['Bancos_id', 'Empleado_id'], 'integer'],
            [['Nodocumento'], 'string', 'max' => 100],
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
            'Fecha' => 'Fecha',
            'Nodocumento' => 'Nodocumento',
            'Monto' => 'Monto',
            'Bancos_id' => 'Bancos ID',
            'Empleado_id' => 'Empleado ID',
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
