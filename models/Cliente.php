<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $NIT
 * @property string $Direccion
 * @property string $Telefono
 * @property string $Correo_Electronico
 * @property string $Correo_electronico2
 * @property string $Telefono2
 * @property double $Saldo
 *
 * @property Receta[] $recetas
 * @property Venta[] $ventas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Direccion','NIT'],'required'],
            [['Saldo'], 'number'],
            [['Nombre', 'Direccion', 'Correo_Electronico', 'Correo_electronico2'], 'string', 'max' => 100],
            [['NIT'], 'string', 'max' => 60],
            [['Telefono', 'Telefono2'], 'string', 'max' => 75],
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
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
            'Correo_Electronico' => 'Correo Electronico',
            'Correo_electronico2' => 'Correo Electronico Secundario',
            'Telefono2' => 'Telefono Secundario',
            'Saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['Cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['Cliente_id' => 'id']);
    }
}
