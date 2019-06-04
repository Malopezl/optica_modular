<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Materiala".
 *
 * @property int $id
 * @property string $Nombre
 *
 * @property Aro[] $aros
 */
class Materiala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Materiala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAros()
    {
        return $this->hasMany(Aro::className(), ['Material_id' => 'id']);
    }
}
