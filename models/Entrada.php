<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Entrada".
 *
 * @property int $id
 * @property string $Nodocumento
 * @property string $Encargado
 * @property int $Aro_id
 * @property int $Accesorios_id
 * @property int $Lentesterm_id
 * @property int $Lenteterm_id
 * @property int $Mobyequipo_id
 * @property int $Cantidad
 * @property double $Precio
 * @property string $Fecha
 * @property int $Empleado_id
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
 * @property Empleado $empleado
 * @property Lentesterm $lentesterm
 * @property Lenteterm $lenteterm
 * @property Mobyequipo $mobyequipo
 */
class Entrada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Entrada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Aro_id', 'Accesorios_id', 'Lentesterm_id', 'Lenteterm_id', 'Mobyequipo_id', 'Cantidad', 'Empleado_id'], 'integer'],
            [['Precio'], 'number'],
            [['Fecha'], 'safe'],
            [['Empleado_id','Fecha','Nodocumento'], 'required'],
            [['Nodocumento'], 'string', 'max' => 100],
            [['Encargado'], 'string', 'max' => 45],
            [['Accesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorios::className(), 'targetAttribute' => ['Accesorios_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['Empleado_id' => 'id']],
            [['Lentesterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lentesterm::className(), 'targetAttribute' => ['Lentesterm_id' => 'id']],
            [['Lenteterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lenteterm::className(), 'targetAttribute' => ['Lenteterm_id' => 'id']],
            [['Mobyequipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mobyequipo::className(), 'targetAttribute' => ['Mobyequipo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nodocumento' => 'No de documento',
            'Encargado' => 'Encargado',
            'Aro_id' => 'Aro',
            'Accesorios_id' => 'Accesorio',
            'Lentesterm_id' => 'Lente semi terminado',
            'Lenteterm_id' => 'Lente Terminado',
            'Mobyequipo_id' => 'Mobiliario y Equipo',
            'Cantidad' => 'Cantidad',
            'Precio' => 'Precio',
            'Fecha' => 'Fecha',
            'Empleado_id' => 'Encargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorios()
    {
        return $this->hasOne(Accesorios::className(), ['id' => 'Accesorios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAro()
    {
        return $this->hasOne(Aro::className(), ['id' => 'Aro_id']);
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
    public function getLentesterm()
    {
        return $this->hasOne(Lentesterm::className(), ['id' => 'Lentesterm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLenteterm()
    {
        return $this->hasOne(Lenteterm::className(), ['id' => 'Lenteterm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobyequipo()
    {
        return $this->hasOne(Mobyequipo::className(), ['id' => 'Mobyequipo_id']);
    }
}
