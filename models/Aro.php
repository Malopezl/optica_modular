<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Aro".
 *
 * @property int $id
 * @property double $Precio_compra
 * @property double $Porcentaje_ganancia
 * @property double $Precio_venta
 * @property string $Codigo
 * @property int $Material_id
 * @property int $Marca_id
 * @property int $Existencia
 *
 * @property Marca $marca
 * @property Materiala $material
 * @property Entrada[] $entradas
 * @property Salida[] $salidas
 */
class Aro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Aro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Porcentaje_ganancia','Material_id','Marca_id','Codigo'], 'required'],
            [['Precio_compra', 'Porcentaje_ganancia', 'Precio_venta'], 'number'],
            [['Material_id', 'Marca_id', 'Existencia'], 'integer'],
            [['Codigo'], 'string', 'max' => 100],
            [['Marca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['Marca_id' => 'id']],
            [['Material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materiala::className(), 'targetAttribute' => ['Material_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Precio_compra' => 'Precio de Compra',
            'Porcentaje_ganancia' => 'Porcentaje de Ganancia',
            'Precio_venta' => 'Precio de Venta',
            'Codigo' => 'Codigo',
            'Material_id' => 'Material',
            'Marca_id' => 'Marca',
            'Existencia' => 'Existencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::className(), ['id' => 'Marca_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Materiala::className(), ['id' => 'Material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['Aro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['Aro_id' => 'id']);
    }
}
