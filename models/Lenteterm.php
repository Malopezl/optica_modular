<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Lenteterm".
 *
 * @property int $id
 * @property int $Graduacion_base
 * @property string $Graduacion_excedente
 * @property double $Precio_compra
 * @property double $Porcentaje_ganancia
 * @property int $Existencia
 * @property int $Material_id
 * @property int $Tipo_id
 * @property double $Precio_venta
 *
 * @property Entrada[] $entradas
 * @property Materiall $material
 * @property Tipo $tipo
 * @property Salida[] $salidas
 */
class Lenteterm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Lenteterm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Graduacion_base', 'Graduacion_excedente', 'Tipo_id', 'Material_id', 'Porcentaje_ganancia'], 'required'],
            [['Graduacion_base', 'Existencia', 'Material_id', 'Tipo_id'], 'integer'],
            [['Precio_compra', 'Porcentaje_ganancia', 'Precio_venta'], 'number'],
            [['Graduacion_excedente'], 'string', 'max' => 40],
            [['Material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materiall::className(), 'targetAttribute' => ['Material_id' => 'id']],
            [['Tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['Tipo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Graduacion_base' => 'Graduacion Base',
            'Graduacion_excedente' => 'Graduacion Excedente',
            'Precio_compra' => 'Precio de Compra',
            'Porcentaje_ganancia' => 'Porcentaje de Ganancia',
            'Existencia' => 'Existencia',
            'Material_id' => 'Material del Lente',
            'Tipo_id' => 'Tipo de Lente',
            'Precio_venta' => 'Precio de Venta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['Lenteterm_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Materiall::className(), ['id' => 'Material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'Tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['Lenteterm_id' => 'id']);
    }
}
