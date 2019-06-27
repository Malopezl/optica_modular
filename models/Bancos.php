<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bancos".
 *
 * @property int $id
 * @property string $No_cuenta
 * @property double $Total
 * @property string $Nombre_b
 * @property string $Tipo_cuenta
 * @property int $Bancosn_id
 *
 * @property Bancosn $bancosn
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
            [['Total'], 'number'],
            [['Bancosn_id'], 'integer'],
            [['No_cuenta'], 'string', 'max' => 45],
            [['Nombre_b', 'Tipo_cuenta'], 'string', 'max' => 100],
            [['Bancosn_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bancosn::className(), 'targetAttribute' => ['Bancosn_id' => 'id']],
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
            'Bancosn_id' => 'Bancosn ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBancosn()
    {
        return $this->hasOne(Bancosn::className(), ['id' => 'Bancosn_id']);
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
