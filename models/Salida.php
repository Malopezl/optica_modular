<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Salida".
 *
 * @property int $id
 * @property string $Fecha
 * @property string $Encargado
 * @property int $Cantidad
 * @property int $Mobyequipo_id
 * @property int $Lenteterm_id
 * @property int $Lentesterm_id
 * @property int $Accesorios_id
 * @property int $Aro_id
 * @property string $Nodocumento
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
 * @property Lentesterm $lentesterm
 * @property Lenteterm $lenteterm
 * @property Mobyequipo $mobyequipo
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Salida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha', 'Cantidad', 'Encargado', 'Nodocumento'], 'required'],
            [['Fecha'], 'safe'],
            [['Cantidad', 'Mobyequipo_id', 'Lenteterm_id', 'Lentesterm_id', 'Accesorios_id', 'Aro_id'], 'integer'],
            [['Encargado'], 'string', 'max' => 100],
            [['Nodocumento'], 'string', 'max' => 45],
            [['Accesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorios::className(), 'targetAttribute' => ['Accesorios_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
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
            'Fecha' => 'Fecha',
            'Encargado' => 'Encargado',
            'Cantidad' => 'Cantidad',
            'Mobyequipo_id' => 'Mobiliario y Equipo',
            'Lenteterm_id' => 'Lente Terminado',
            'Lentesterm_id' => 'Lente Semiterminado',
            'Accesorios_id' => 'Accesorio',
            'Aro_id' => 'Aro',
            'Nodocumento' => 'No de Documento',
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
