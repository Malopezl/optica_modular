<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detallenomina".
 *
 * @property int $id
 * @property double $Horas_extra
 * @property double $bonos_extra
 * @property double $B_incentivo
 * @property double $Sub_total
 * @property string $T_devengado
 * @property double $Igss_total
 * @property double $Isr_total
 * @property double $D_extra
 * @property double $T_descuentos
 * @property double $T_percibido
 * @property int $Nomina_id
 * @property int $Empleado_id
 *
 * @property Empleado $empleado
 * @property Nomina $nomina
 */
class Detallenomina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detallenomina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Nomina_id', 'Empleado_id'], 'required'],
            [['id', 'Nomina_id', 'Empleado_id'], 'integer'],
            [['Horas_extra', 'bonos_extra', 'B_incentivo', 'Sub_total', 'Igss_total', 'Isr_total', 'D_extra', 'T_descuentos', 'T_percibido'], 'number'],
            [['T_devengado'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['Empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['Empleado_id' => 'id']],
            [['Nomina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomina::className(), 'targetAttribute' => ['Nomina_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Horas_extra' => Yii::t('app', 'Horas Extra'),
            'bonos_extra' => Yii::t('app', 'Bonos Extra'),
            'B_incentivo' => Yii::t('app', 'B Incentivo'),
            'Sub_total' => Yii::t('app', 'Sub Total'),
            'T_devengado' => Yii::t('app', 'T Devengado'),
            'Igss_total' => Yii::t('app', 'Igss Total'),
            'Isr_total' => Yii::t('app', 'Isr Total'),
            'D_extra' => Yii::t('app', 'D Extra'),
            'T_descuentos' => Yii::t('app', 'T Descuentos'),
            'T_percibido' => Yii::t('app', 'T Percibido'),
            'Nomina_id' => Yii::t('app', 'Nomina ID'),
            'Empleado_id' => Yii::t('app', 'Empleado ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'Empleado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomina()
    {
        return $this->hasOne(Nomina::className(), ['id' => 'Nomina_id']);
    }
}
