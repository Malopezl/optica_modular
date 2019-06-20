<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Profesion".
 *
 * @property int $id
 * @property string $Nombre
 *
 * @property Empleado[] $empleados
 */
class Profesion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Profesion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 100],
            [['Nombre'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['Profesion_id' => 'id']);
    }
}
