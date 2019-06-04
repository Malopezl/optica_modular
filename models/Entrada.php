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
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
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
            [['Aro_id', 'Accesorios_id', 'Lentesterm_id', 'Lenteterm_id', 'Mobyequipo_id', 'Cantidad'], 'integer'],
            [['Precio'], 'number'],
            [['Fecha'], 'safe'],
            [['Nodocumento'], 'string', 'max' => 100],
            [['Encargado'], 'string', 'max' => 45],
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
            'Nodocumento' => 'Nodocumento',
            'Encargado' => 'Encargado',
            'Aro_id' => 'Aro ID',
            'Accesorios_id' => 'Accesorios ID',
            'Lentesterm_id' => 'Lentesterm ID',
            'Lenteterm_id' => 'Lenteterm ID',
            'Mobyequipo_id' => 'Mobyequipo ID',
            'Cantidad' => 'Cantidad',
            'Precio' => 'Precio',
            'Fecha' => 'Fecha',
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
