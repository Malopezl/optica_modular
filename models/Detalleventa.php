<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detalleventa".
 *
 * @property int $id
 * @property double $Cantidad
 * @property int $Venta_id
 * @property int $Accesorios_id
 * @property int $Aro_id
 * @property double $Descuento
 * @property double $Total
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
 * @property Venta $venta
 */
class Detalleventa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detalleventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cantidad','Descuento'],'required'],
            [['Cantidad', 'Descuento', 'Total'], 'number'],
            [['Venta_id', 'Accesorios_id', 'Aro_id'], 'integer'],
            [['Accesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorios::className(), 'targetAttribute' => ['Accesorios_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Venta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['Venta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Cantidad' => 'Cantidad',
            'Venta_id' => 'Venta ID',
            'Accesorios_id' => 'Accesorio',
            'Aro_id' => 'Aro',
            'Descuento' => 'Descuento',
            'Total' => 'Total',
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
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['id' => 'Venta_id']);
    }
}
