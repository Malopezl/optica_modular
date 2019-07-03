<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Abonos".
 *
 * @property int $id
 * @property int $Cliente_id
 * @property string $Fecha
 * @property double $Cantidad
 * @property string $Encargado
 * @property string $Nodocumento
 *
 * @property Cliente $cliente
 */
class Abonos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Abonos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha','Cliente_id','Encargado','Cantidad','Nodocumento'],'required'],
            [['Cliente_id'], 'integer'],
            [['Fecha'], 'safe'],
            [['Cantidad'], 'number'],
            [['Encargado'], 'string', 'max' => 45],
            [['Nodocumento'], 'string', 'max' => 100],
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
            'Cliente_id' => 'Cliente',
            'Fecha' => 'Fecha',
            'Cantidad' => 'Cantidad',
            'Encargado' => 'Encargado',
            'Nodocumento' => 'No. de documento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'Cliente_id']);
    }
}
