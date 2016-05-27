<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hardware".
 *
 * @property integer $Hardware_ID
 * @property integer $Leverancier_ID
 * @property integer $Fabrikant_ID
 * @property integer $Locatie_ID
 * @property string $Besturingssysteem
 * @property string $Omschrijving
 * @property string $Status
 * @property string $Jaar_van_aanschaf
 *
 * @property HardSoftwareKoppeling[] $hardSoftwareKoppelings
 * @property Software[] $softwares
 * @property Fabrikant $fabrikant
 * @property Leverancier $leverancier
 * @property Locatie $locatie
 * @property Incidenten[] $incidentens
 */
class Hardware extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hardware';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Leverancier_ID', 'Fabrikant_ID', 'Locatie_ID'], 'integer'],
            [['Leverancier_ID', 'Fabrikant_ID', 'Locatie_ID'], 'required'],
            [['Besturingssysteem', 'Omschrijving', 'Status', 'Jaar_van_aanschaf'], 'string', 'max' => 45],
            [['Besturingssysteem', 'Omschrijving', 'Jaar_van_aanschaf'], 'required'],
            [['Fabrikant_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Fabrikant::className(), 'targetAttribute' => ['Fabrikant_ID' => 'Fabrikant_ID']],
            [['Leverancier_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Leverancier::className(), 'targetAttribute' => ['Leverancier_ID' => 'Leverancier_ID']],
            [['Locatie_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Locatie::className(), 'targetAttribute' => ['Locatie_ID' => 'Locatie_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Hardware_ID' => 'Hardware  ID',
            'Leverancier_ID' => 'Leverancier  ID',
            'Fabrikant_ID' => 'Fabrikant  ID',
            'Locatie_ID' => 'Locatie  ID',
            'Besturingssysteem' => 'Besturingssysteem',
            'Omschrijving' => 'Omschrijving',
            'Status' => 'Status',
            'Jaar_van_aanschaf' => 'Jaar Van Aanschaf',
            'leverancier.naam' => 'Leveranciernaam',
            'fabrikant.naam' => 'Fabrikantnaam',
            'locatie.adres' => 'Adres',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardSoftwareKoppelings()
    {
        return $this->hasMany(HardSoftwareKoppeling::className(), ['Hardware_ID' => 'Hardware_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwares()
    {
        return $this->hasMany(Software::className(), ['Software_ID' => 'Software_ID'])->viaTable('hard_software_koppeling', ['Hardware_ID' => 'Hardware_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabrikant()
    {
        return $this->hasOne(Fabrikant::className(), ['Fabrikant_ID' => 'Fabrikant_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeverancier()
    {
        return $this->hasOne(Leverancier::className(), ['Leverancier_ID' => 'Leverancier_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocatie()
    {
        return $this->hasOne(Locatie::className(), ['Locatie_ID' => 'Locatie_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentens()
    {
        return $this->hasMany(Incidenten::className(), ['Hardware_ID33' => 'Hardware_ID']);
    }

    public function getLeveranciernaam() {
        return $this->leverancier->Naam;
    }

    public function getFabrikantnaam() {
        return $this->fabrikant->Naam;
    }

    public function getAdres() {
        return $this->locatie->Adres;
    }
}
