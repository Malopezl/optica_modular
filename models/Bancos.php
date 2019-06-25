<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bancos".
 *
 * @property int $id
 * @property string $No_cuenta
 * @property string $Total
 * @property string $Nombre_b
 * @property string $Tipo_cuenta
 *
 * @property Deposito[] $depositos
 * @property Pagopbanco[] $pagopbancos
 * @property Retiro[] $retiros
 */
class Bancos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Bancos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['No_cuenta', 'Total'], 'string', 'max' => 45],
            [['Nombre_b', 'Tipo_cuenta'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'No_cuenta' => 'No Cuenta',
            'Total' => 'Total',
            'Nombre_b' => 'Nombre B',
            'Tipo_cuenta' => 'Tipo Cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepositos()
    {
        return $this->hasMany(Deposito::className(), ['Bancos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagopbancos()
    {
        return $this->hasMany(Pagopbanco::className(), ['Bancos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetiros()
    {
        return $this->hasMany(Retiro::className(), ['Bancos_id' => 'id']);
    }
}
