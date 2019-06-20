<?php

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "Empleado".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Nit
 * @property string $Telefono
 * @property string $Telefono2
 * @property string $Correo_Electronico
 * @property string $Correo_electronico2
 * @property string $Direccion
 * @property string $Fecha_Nacimiento
 * @property int $Edad
 * @property int $Estado_civil
 * @property int $Sexo
 * @property string $No_licencia
 * @property string $Cv
 * @property int $Profesion_id
 * @property int $Cargo_id
 * @property int $Contratacion_id
 *
 * @property Cargo $cargo
 * @property Contratacion $contratacion
 * @property Profesion $profesion
 * @property Entradasalida[] $entradasalidas
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'Empleado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_Nacimiento', 'Nombre', 'Nit', 'Telefono', 'Correo_Electronico','Estado_civil','Sexo','file'], 'required'],
            [['Edad', 'Estado_civil','Sexo', 'Profesion_id', 'Cargo_id', 'Contratacion_id'], 'integer'],
            [['Cv'], 'string', 'max' => 100],
            [['Profesion_id', 'Cargo_id', 'Contratacion_id'], 'required'],
            [['Nombre', 'Correo_Electronico', 'Correo_electronico2', 'Direccion'], 'string', 'max' => 100],
            [['Nit'], 'string', 'max' => 60],
            [['Telefono', 'Telefono2'], 'string', 'max' => 75],
            [['No_licencia'], 'string', 'max' => 45],
            [['file'], 'file', 'extensions'=>'pdf'],
            [['Cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['Cargo_id' => 'id']],
            [['Contratacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contratacion::className(), 'targetAttribute' => ['Contratacion_id' => 'id']],
            [['Profesion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profesion::className(), 'targetAttribute' => ['Profesion_id' => 'id']],
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
            'Nit' => 'Nit',
            'Telefono' => 'Telefono',
            'Telefono2' => 'Telefono 2',
            'Correo_Electronico' => 'Correo Electronico',
            'Correo_electronico2' => 'Correo Electronico 2',
            'Direccion' => 'Direccion',
            'Fecha_Nacimiento' => 'Fecha Nacimiento',
            'Edad' => 'Edad',
            'Estado_civil' => 'Estado Civil',
            'Sexo' => 'Sexo',
            'No_licencia' => 'No. Licencia',
            'Cv' => 'Curriculum',
            'Profesion_id' => 'Profesion',
            'Cargo_id' => 'Cargo',
            'Contratacion_id' => 'Contratacion ',
            'file'=>'Seleccionar Curriculum',


        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'Cargo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContratacion()
    {
        return $this->hasOne(Contratacion::className(), ['id' => 'Contratacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesion()
    {
        return $this->hasOne(Profesion::className(), ['id' => 'Profesion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradasalidas()
    {
        return $this->hasMany(Entradasalida::className(), ['Empleado_id' => 'id']);
    }
}
