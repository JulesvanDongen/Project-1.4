<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fabrikant".
 *
 * @property integer $Fabrikant_ID
 * @property string $Naam
 * @property string $Adres
 * @property integer $Telefoon
 * @property string $Email
 *
 * @property Hardware[] $hardwares
 * @property Software[] $softwares
 */
class Fabrikant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fabrikant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Telefoon'], 'integer'],
            [['Naam', 'Adres', 'Email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fabrikant_ID' => 'Fabrikant  ID',
            'Naam' => 'Naam',
            'Adres' => 'Adres',
            'Telefoon' => 'Telefoon',
            'Email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardwares()
    {
        return $this->hasMany(Hardware::className(), ['Fabrikant_ID' => 'Fabrikant_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwares()
    {
        return $this->hasMany(Software::className(), ['Fabrikant_ID22' => 'Fabrikant_ID']);
    }
}
