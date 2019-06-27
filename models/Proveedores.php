<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Proveedores".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $NIT
 * @property string $Telefono
 * @property string $Telefono2
 * @property string $Correo1
 * @property string $Correo2
 * @property string $Direccion
 * @property double $Saldo
 *
 * @property Compras[] $compras
 * @property PagopBanco[] $pagopBancos
 * @property PagopEfectivo[] $pagopEfectivos
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Saldo'], 'number'],
            [['Nombre', 'Direccion'], 'string', 'max' => 100],
            [['NIT', 'Telefono', 'Telefono2'], 'string', 'max' => 45],
            [['Correo1', 'Correo2'], 'string', 'max' => 75],
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
            'NIT' => 'Nit',
            'Telefono' => 'Telefono',
            'Telefono2' => 'Telefono2',
            'Correo1' => 'Correo1',
            'Correo2' => 'Correo2',
            'Direccion' => 'Direccion',
            'Saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compras::className(), ['Proveedores_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagopBancos()
    {
        return $this->hasMany(PagopBanco::className(), ['Proveedores_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagopEfectivos()
    {
        return $this->hasMany(PagopEfectivo::className(), ['Proveedores_id' => 'id']);
    }
}
