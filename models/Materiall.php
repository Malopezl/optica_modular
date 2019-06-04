<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Materiall".
 *
 * @property int $id
 * @property string $Material
 *
 * @property Lentesterm[] $lentesterms
 * @property Lenteterm[] $lenteterms
 */
class Materiall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Materiall';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Material'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Material' => 'Material',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLentesterms()
    {
        return $this->hasMany(Lentesterm::className(), ['Material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLenteterms()
    {
        return $this->hasMany(Lenteterm::className(), ['Material_id' => 'id']);
    }
}
