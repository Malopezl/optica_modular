<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Nomina".
 *
 * @property int $id
 * @property string $Fechai
 * @property string $Fechaf
 * @property double $Total
 *
 * @property Detallenomina[] $detallenominas
 * @property Retiro[] $retiros
 */
class Nomina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Nomina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['Fechai', 'Fechaf'], 'safe'],
            [['Total'], 'number'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Fechai' => Yii::t('app', 'Fechai'),
            'Fechaf' => Yii::t('app', 'Fechaf'),
            'Total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallenominas()
    {
        return $this->hasMany(Detallenomina::className(), ['Nomina_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetiros()
    {
        return $this->hasMany(Retiro::className(), ['Nomina_id' => 'id']);
    }
}
