<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Mobyequipo".
 *
 * @property int $id
 * @property string $Descripcion
 * @property string $fechaCompra
 * @property double $Precio_compra
 * @property int $Existencia
 * @property int $Depreciacion_id
 * @property double $Precio_venta
 *
 * @property Entrada[] $entradas
 * @property Depreciacion $depreciacion
 * @property Salida[] $salidas
 */
class Mobyequipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Mobyequipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaCompra', 'Exostencia', 'Depreciacion_id'], 'required'],
            [['Descripcion'], 'string'],
            [['fechaCompra'], 'safe'],
            [['Precio_compra', 'Precio_venta'], 'number'],
            [['Existencia', 'Depreciacion_id'], 'integer'],
            [['Depreciacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Depreciacion::className(), 'targetAttribute' => ['Depreciacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Descripcion' => 'Descripcion',
            'fechaCompra' => 'Fecha de Compra',
            'Precio_compra' => 'Precio de Compra',
            'Existencia' => 'Existencia',
            'Depreciacion_id' => 'Depreciacion',
            'Precio_venta' => 'Precio de Venta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['Mobyequipo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepreciacion()
    {
        return $this->hasOne(Depreciacion::className(), ['id' => 'Depreciacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['Mobyequipo_id' => 'id']);
    }
}
