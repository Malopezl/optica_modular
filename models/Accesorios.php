<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Accesorios".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Descripcion
 * @property double $Precio_compra
 * @property int $Existencia
 * @property double $Porcentaje_ganancia
 * @property double $Precio_venta
 *
 * @property Entrada[] $entradas
 * @property Salida[] $salidas
 */
class Accesorios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Accesorios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'string'],
            [['Precio_compra', 'Porcentaje_ganancia', 'Precio_venta'], 'number'],
            [['Existencia'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Precio_compra' => 'Precio Compra',
            'Existencia' => 'Existencia',
            'Porcentaje_ganancia' => 'Porcentaje Ganancia',
            'Precio_venta' => 'Precio Venta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['Accesorios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['Accesorios_id' => 'id']);
    }
}
