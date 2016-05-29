<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incidenten".
 *
 * @property integer $Incident_ID
 * @property integer $Hardware_ID
 * @property integer $Software_ID
 * @property string $Probleembeschrijving
 * @property string $Datum
 * @property string $Tijd
 * @property string $Ingevuld_tijdens_vragenscript
 * @property integer $Niet_oplosbaar
 * @property integer $Afgehandeld
 * @property integer $In_behandeling_door
 * @property integer $Ingevuld_door
 *
 * @property Hardware $hardware
 * @property Software $software
 * @property User $inBehandelingDoor
 * @property User $ingevuldDoor
 */
class Incidenten extends \yii\db\ActiveRecord
{
    public $neemInBehandeling = false;
    public $Type;

    public static $prioriteiten = [
        'Spoed',
        'Hoog',
        'Gemiddeld',
        'Laag',
    ];

    public static $types = [
        
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incidenten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hardware_ID', 'Software_ID', 'Niet_oplosbaar', 'Afgehandeld', 'In_behandeling_door', 'Ingevuld_door'], 'integer'],
            [['Probleembeschrijving'], 'string'],
            [['Datum', 'Tijd', 'neemInBehandeling', 'Type'], 'safe'],
            [['Ingevuld_tijdens_vragenscript'], 'string', 'max' => 255],
            [['Hardware_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Hardware::className(), 'targetAttribute' => ['Hardware_ID' => 'Hardware_ID']],
            [['Software_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Software::className(), 'targetAttribute' => ['Software_ID' => 'Software_ID']],
            [['In_behandeling_door'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['In_behandeling_door' => 'id']],
            [['Ingevuld_door'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Ingevuld_door' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Incident_ID' => 'Incident  ID',
            'Hardware_ID' => 'Hardware  ID',
            'Software_ID' => 'Software  ID',
            'Probleembeschrijving' => 'Probleembeschrijving',
            'Datum' => 'Datum',
            'Tijd' => 'Tijd',
            'Type' => 'Type',
            'Ingevuld_tijdens_vragenscript' => 'Ingevuld Tijdens Vragenscript',
            'Niet_oplosbaar' => 'Niet Oplosbaar',
            'Afgehandeld' => 'Afgehandeld',
            'In_behandeling_door' => 'In Behandeling Door',
            'Ingevuld_door' => 'Ingevuld Door',
            'neem-in-behandeling' => 'Neem in behandeling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardware()
    {
        return $this->hasOne(Hardware::className(), ['Hardware_ID' => 'Hardware_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['Software_ID' => 'Software_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInBehandelingDoor()
    {
        return $this->hasOne(User::className(), ['id' => 'In_behandeling_door']);
    }

    public function getNeemInBehandeling() {
        return $this->neemInBehandeling;
    }

    public function setNeemInBehandeling($value) {
        $this->neemInBehandeling = $value;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngevuldDoor()
    {
        return $this->hasOne(User::className(), ['id' => 'Ingevuld_door']);
    }
}
