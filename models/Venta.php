<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Venta".
 *
 * @property int $id
 * @property string $Nodocumento
 * @property string $Fecha
 * @property double $Total
 * @property double $Credito
 * @property double $Contado
 * @property int $Cliente_id
 * @property string $Encargado
 *
 * @property DetalleVenta[] $detalleVentas
 * @property Orden[] $ordens
 * @property Cliente $cliente
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Total', 'Credito', 'Contado'], 'number'],
            [['Cliente_id'], 'integer'],
            [['Nodocumento', 'Encargado'], 'string', 'max' => 100],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
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
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Credito' => 'Credito',
            'Contado' => 'Contado',
            'Cliente_id' => 'Cliente ID',
            'Encargado' => 'Encargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleVentas()
    {
        return $this->hasMany(DetalleVenta::className(), ['Venta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::className(), ['Venta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'Cliente_id']);
    }
}
