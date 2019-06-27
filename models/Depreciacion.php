<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Depreciacion".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Descripcion
 * @property double $porcentaje
 *
 * @property Mobyequipo[] $mobyequipos
 */
class Depreciacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Depreciacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'porcentaje'], 'required'],
            [['Descripcion'], 'string'],
            [['porcentaje'], 'number'],
            [['Nombre'], 'string', 'max' => 100],
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
            'Descripcion' => 'Descripcion',
            'porcentaje' => 'Porcentaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobyequipos()
    {
        return $this->hasMany(Mobyequipo::className(), ['Depreciacion_id' => 'id']);
    }
}
