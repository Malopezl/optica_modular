<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detallecompra".
 *
 * @property int $id
 * @property double $Cantidad
 * @property double $Precio_compra
 * @property double $Total
 * @property int $Lenteterm_id
 * @property int $Lentesterm_id
 * @property int $Accesorios_id
 * @property int $Aro_id
 * @property int $Compras_id
 * @property int $Mobyequipo_id
 *
 * @property Accesorios $accesorios
 * @property Aro $aro
 * @property Compras $compras
 * @property Lentesterm $lentesterm
 * @property Lenteterm $lenteterm
 * @property Mobyequipo $mobyequipo
 */
class Detallecompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detallecompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cantidad', 'Precio_compra', 'Total'], 'number'],
            [['Lenteterm_id', 'Lentesterm_id', 'Accesorios_id', 'Aro_id', 'Compras_id', 'Mobyequipo_id'], 'integer'],
            [['Accesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorios::className(), 'targetAttribute' => ['Accesorios_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aro::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Compras_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compras::className(), 'targetAttribute' => ['Compras_id' => 'id']],
            [['Lentesterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lentesterm::className(), 'targetAttribute' => ['Lentesterm_id' => 'id']],
            [['Lenteterm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lenteterm::className(), 'targetAttribute' => ['Lenteterm_id' => 'id']],
            [['Mobyequipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mobyequipo::className(), 'targetAttribute' => ['Mobyequipo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Cantidad' => 'Cantidad',
            'Precio_compra' => 'Precio Compra',
            'Total' => 'Total',
            'Lenteterm_id' => 'Lenteterm ID',
            'Lentesterm_id' => 'Lentesterm ID',
            'Accesorios_id' => 'Accesorios ID',
            'Aro_id' => 'Aro ID',
            'Compras_id' => 'Compras ID',
            'Mobyequipo_id' => 'Mobyequipo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorios()
    {
        return $this->hasOne(Accesorios::className(), ['id' => 'Accesorios_id']);
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
    public function getCompras()
    {
        return $this->hasOne(Compras::className(), ['id' => 'Compras_id']);
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
    public function getMobyequipo()
    {
        return $this->hasOne(Mobyequipo::className(), ['id' => 'Mobyequipo_id']);
    }
}
