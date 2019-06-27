<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bancosn".
 *
 * @property int $id
 * @property string $Nombre
 *
 * @property Bancos[] $bancos
 */
class Bancosn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Bancosn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 45],
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
    public function getBancos()
    {
        return $this->hasMany(Bancos::className(), ['Bancosn_id' => 'id']);
    }
}
