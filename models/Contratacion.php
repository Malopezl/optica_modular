<?php

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "Contratacion".
 *
 * @property int $id
 * @property int $Encargado_id
 * @property string $Fechai
 * @property string $Fechaf
 * @property array $Contrato
 * @property string $Nombre_cont
 *
 * @property Empleado[] $empleados
 */
class Contratacion extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public $file;
    

    public static function tableName()
    {
        return 'Contratacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       /** return [
            [['Encargado_id'], 'integer'],
            [['Fechai', 'Fechaf'], 'safe'],
            [['Contrato'], 'string'],
        ];*/
         return [
            [['Fechai','Encargado_id'], 'required'],
            [['Fechai', 'Fechaf'], 'safe'],
            [['Encargado_id'], 'integer'],
            [['Contrato'], 'string'],
            [['file'], 'file', 'extensions'=>'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Encargado_id' => 'Encargado ID',
            'Fechai' => 'Fecha Inicio Contrato ',
            'Fechaf' => 'Fecha Fin Contrato',
            'Contrato' => 'Contrato',
            'file'=>'Seleccionar contrato',
        ];   
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['Contratacion_id' => 'id']);
    }


}
