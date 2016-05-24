<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property integer $Software_ID
 * @property string $Naam
 * @property string $Omschrijving
 * @property integer $Fabrikant_ID22
 * @property integer $Leverancier_ID22
 *
 * @property HardSoftwareKoppeling[] $hardSoftwareKoppelings
 * @property Hardware[] $hardwares
 * @property Incidenten[] $incidentens
 * @property Fabrikant $fabrikantID22
 * @property Leverancier $leverancierID22
 */
class Software extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'software';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fabrikant_ID22', 'Leverancier_ID22'], 'integer'],
            [['Naam', 'Omschrijving'], 'string', 'max' => 45],
            [['Fabrikant_ID22'], 'exist', 'skipOnError' => true, 'targetClass' => Fabrikant::className(), 'targetAttribute' => ['Fabrikant_ID22' => 'Fabrikant_ID']],
            [['Leverancier_ID22'], 'exist', 'skipOnError' => true, 'targetClass' => Leverancier::className(), 'targetAttribute' => ['Leverancier_ID22' => 'Leverancier_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Software_ID' => 'Software  ID',
            'Naam' => 'Naam',
            'Omschrijving' => 'Omschrijving',
            'Fabrikant_ID22' => 'Fabrikant  Id22',
            'Leverancier_ID22' => 'Leverancier  Id22',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardSoftwareKoppelings()
    {
        return $this->hasMany(HardSoftwareKoppeling::className(), ['Software_ID' => 'Software_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardwares()
    {
        return $this->hasMany(Hardware::className(), ['Hardware_ID' => 'Hardware_ID'])->viaTable('hard_software_koppeling', ['Software_ID' => 'Software_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentens()
    {
        return $this->hasMany(Incidenten::className(), ['Software_ID33' => 'Software_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabrikantID22()
    {
        return $this->hasOne(Fabrikant::className(), ['Fabrikant_ID' => 'Fabrikant_ID22']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeverancierID22()
    {
        return $this->hasOne(Leverancier::className(), ['Leverancier_ID' => 'Leverancier_ID22']);
    }
}
