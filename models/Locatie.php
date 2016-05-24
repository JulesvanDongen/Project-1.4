<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locatie".
 *
 * @property integer $Locatie_ID
 * @property string $Adres
 * @property string $Postcode
 * @property integer $Telefoon
 *
 * @property Hardware[] $hardwares
 */
class Locatie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locatie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Telefoon'], 'integer'],
            [['Adres', 'Postcode'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Locatie_ID' => 'Locatie  ID',
            'Adres' => 'Adres',
            'Postcode' => 'Postcode',
            'Telefoon' => 'Telefoon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardwares()
    {
        return $this->hasMany(Hardware::className(), ['Locatie_ID' => 'Locatie_ID']);
    }
}
