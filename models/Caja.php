<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Caja".
 *
 * @property int $id
 * @property double $Total
 * @property string $Fecha
 *
 * @property Pagopefectivo[] $pagopefectivos
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Total'], 'number'],
            [['Fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Total' => 'Total',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagopefectivos()
    {
        return $this->hasMany(Pagopefectivo::className(), ['Caja_id' => 'id']);
    }
}
