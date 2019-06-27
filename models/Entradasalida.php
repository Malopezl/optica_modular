<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Entradasalida".
 *
 * @property int $id
 * @property string $Fecha
 * @property int $Estado
 * @property int $Empleado_id
 *
 * @property Empleado $empleado
 */
class Entradasalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Entradasalida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha'], 'required'],
            [['Estado', 'Empleado_id'], 'integer'],
            [['Empleado_id', 'Estado'], 'required'],
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
            'Estado' => 'Estado',
            'Empleado_id' => 'Empleado ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'Empleado_id']);
    }
}
