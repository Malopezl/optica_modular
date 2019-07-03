<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Orden".
 *
 * @property int $id
 * @property int $Receta_id
 * @property int $Lentei_id
 * @property int $Lented_id
 * @property int $Aro_id
 * @property string $No_Caja
 * @property int $Venta_id
 * @property string $Fecha_Entrega
 * @property string $Anotaciones
 * @property double $Descuento
 * @property int $Entregada
 * @property int $Lista
 * @property double $Total
 * @property int $Finalizada
 *
 * @property Detalleorden $lentei
 * @property Detalleorden $lented
 * @property Detalleorden $aro
 * @property Receta $receta
 * @property Venta $venta
 */
class Orden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Orden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Receta_id','No_Caja','Descuento'],'required'],
            [['Receta_id', 'Lentei_id', 'Lented_id', 'Aro_id', 'Venta_id', 'Entregada', 'Lista', 'Finalizada'], 'integer'],
            [['Fecha_Entrega'], 'safe'],
            [['Anotaciones'], 'string'],
            [['Descuento', 'Total'], 'number'],
            [['No_Caja'], 'string', 'max' => 45],
            [['Lentei_id'], 'exist', 'skipOnError' => true, 'targetClass' => Detalleorden::className(), 'targetAttribute' => ['Lentei_id' => 'id']],
            [['Lented_id'], 'exist', 'skipOnError' => true, 'targetClass' => Detalleorden::className(), 'targetAttribute' => ['Lented_id' => 'id']],
            [['Aro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Detalleorden::className(), 'targetAttribute' => ['Aro_id' => 'id']],
            [['Receta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receta::className(), 'targetAttribute' => ['Receta_id' => 'id']],
            [['Venta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['Venta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Receta_id' => 'Receta',
            'Lentei_id' => 'Lente izquierdo',
            'Lented_id' => 'Lente derecho',
            'Aro_id' => 'Aro',
            'No_Caja' => 'No. de Caja',
            'Venta_id' => 'Venta',
            'Fecha_Entrega' => 'Fecha de Entrega',
            'Anotaciones' => 'Anotaciones',
            'Descuento' => 'Descuento',
            'Entregada' => 'Entregada',
            'Lista' => 'Lista',
            'Total' => 'Total',
            'Finalizada' => 'Finalizada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLentei()
    {
        return $this->hasOne(Detalleorden::className(), ['id' => 'Lentei_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLented()
    {
        return $this->hasOne(Detalleorden::className(), ['id' => 'Lented_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAro()
    {
        return $this->hasOne(Detalleorden::className(), ['id' => 'Aro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceta()
    {
        return $this->hasOne(Receta::className(), ['id' => 'Receta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['id' => 'Venta_id']);
    }
}
