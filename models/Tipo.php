<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tipo".
 *
 * @property int $id
 * @property string $Tipo
 *
 * @property Lentesterm[] $lentesterms
 * @property Lenteterm[] $lenteterms
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLentesterms()
    {
        return $this->hasMany(Lentesterm::className(), ['Tipo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLenteterms()
    {
        return $this->hasMany(Lenteterm::className(), ['Tipo_id' => 'id']);
    }
}
