<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cargo".
 *
 * @property int $id
 * @property string $Nombre
 * @property double $Sueldo_Base
 * @property int $Nivel_Acceso
 *
 * @property Empleado[] $empleados
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Sueldo_Base'], 'number'],
            [['Nivel_Acceso'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
            [['Nombre', 'Sueldo_Base', 'Nivel_Acceso'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Sueldo_Base' => 'Sueldo Base',
            'Nivel_Acceso' => 'Nivel Acceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['Cargo_id' => 'id']);
    }
}
