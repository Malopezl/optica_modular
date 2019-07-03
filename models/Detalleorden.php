<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detalleorden".
 *
 * @property int $id
 * @property int $Aro_id
 * @property int $Lentesterm_id
 * @property int $Lenteterm_id
 * @property double $Descuento
 * @property double $Total
 *
 * @property Aro $aro
 * @property Lentesterm $lentesterm
 * @property Lenteterm $lenteterm
 * @property Orden[] $ordens
 * @property Orden[] $ordens0
 * @property Orden[] $ordens1
 */
class Detalleorden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detalleorden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descuento'],'required'],
            [['Aro_id', 'Lentesterm_id', 'Lenteterm_id'], 'integer'],
            [['Descuento', 'Total'], 'number'],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Lentesterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lentesterm::className(), 'targetAttribute' => ['Lentesterm_id' => 'id']],
            [['Lenteterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lenteterm::className(), 'targetAttribute' => ['Lenteterm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Aro_id' => 'Aro',
            'Lentesterm_id' => 'Lente semiterminado',
            'Lenteterm_id' => 'Lente terminado',
            'Descuento' => 'Descuento',
            'Total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAro()
    {
        return $this->hasOne(Aro::className(), ['id' => 'Aro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLentesterm()
    {
        return $this->hasOne(Lentesterm::className(), ['id' => 'Lentesterm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLenteterm()
    {
        return $this->hasOne(Lenteterm::className(), ['id' => 'Lenteterm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::className(), ['Lentei_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens0()
    {
        return $this->hasMany(Orden::className(), ['Lented_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens1()
    {
        return $this->hasMany(Orden::className(), ['Aro_id' => 'id']);
    }
}
