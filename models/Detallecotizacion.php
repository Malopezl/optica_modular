<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detallecotizacion".
 *
 * @property int $id
 * @property int $Cotizacion_id
 * @property int $Aro_id
 * @property int $Accesorios_id
 * @property int $Lentesterm_id
 * @property int $Lenteterm_id
 * @property double $Total
 * @property double $Cantidad
 * @property double $Descuento
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
 * @property Cotizacion $cotizacion
 * @property Lentesterm $lentesterm
 * @property Lenteterm $lenteterm
 */
class Detallecotizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detallecotizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cotizacion_id', 'Aro_id', 'Accesorios_id', 'Lentesterm_id', 'Lenteterm_id'], 'integer'],
            [['Total', 'Cantidad', 'Descuento'], 'number'],
            [['Accesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorios::className(), 'targetAttribute' => ['Accesorios_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Cotizacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['Cotizacion_id' => 'id']],
            [['Lentesterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lentesterm::className(), 'targetAttribute' => ['Lentesterm_id' => 'id']],
            [['Lenteterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lenteterm::className(), 'targetAttribute' => ['Lenteterm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Cotizacion_id' => 'Cotizacion ID',
            'Aro_id' => 'Aro ID',
            'Accesorios_id' => 'Accesorios ID',
            'Lentesterm_id' => 'Lentesterm ID',
            'Lenteterm_id' => 'Lenteterm ID',
            'Total' => 'Total',
            'Cantidad' => 'Cantidad',
            'Descuento' => 'Descuento',
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
    public function getCotizacion()
    {
        return $this->hasOne(Cotizacion::className(), ['id' => 'Cotizacion_id']);
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
}
