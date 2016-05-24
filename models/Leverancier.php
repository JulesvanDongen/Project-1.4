<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leverancier".
 *
 * @property integer $Leverancier_ID
 * @property string $Naam
 * @property string $Adres
 * @property integer $Telefoon
 * @property string $Email
 * @property integer $Rekeningsnummer
 *
 * @property Hardware[] $hardwares
 * @property Software[] $softwares
 */
class Leverancier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leverancier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Telefoon', 'Rekeningsnummer'], 'integer'],
            [['Naam', 'Adres', 'Email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Leverancier_ID' => 'Leverancier  ID',
            'Naam' => 'Naam',
            'Adres' => 'Adres',
            'Telefoon' => 'Telefoon',
            'Email' => 'Email',
            'Rekeningsnummer' => 'Rekeningsnummer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardwares()
    {
        return $this->hasMany(Hardware::className(), ['Leverancier_ID' => 'Leverancier_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwares()
    {
        return $this->hasMany(Software::className(), ['Leverancier_ID22' => 'Leverancier_ID']);
    }
}
