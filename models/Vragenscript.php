<?php

    namespace app\models;

    use yii\base\Model;
/**
 * Created by PhpStorm.
 * User: Jules
 * Date: 28/05/2016
 * Time: 20:18
 */
class Vragenscript extends Model
{
    // Hoofdvraag
    public $h1;
    public static $h1answers = [
        'computer' => 'Een computer',
        'printer_of_scanner' => 'Een printer of scanner',
        'overig' => 'Overig',
    ];

    // Printervragen
    public $p1;
    public static $p1answers = [
        'printer' => 'Printer',
        'scanner' => 'Scanner',
    ];

    // Computer vragen
    public $c1;
    public $c2;
    public $c3;
    public $c4;

    // Algemene vragen
    public $beschrijving;
    public $software_id;
    public $hardware_id;
    public $type;

    public static $yesnoanswers = [
        'ja' => 'Ja',
        'nee' => 'Nee',
    ];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['h1', 'p1', 'c1', 'c2', 'c3', 'c4', 'beschrijving', 'hardware_id', 'software_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'h1' => 'Waar heb je problemen mee?',
            'p1' => 'Heb je problemen met een printer of scanner?',
            'c1' => 'Start de computer op?',
            'c2' => 'Kan je jezelf aanmelden op de computer?',
            'c3' => 'Is de website www.dehondsrug.nl te bereiken?',
            'c4' => 'Heb je problemen met de software?',
            'hardware_id' => 'Hardware ID',
            'software_id' => 'Software',
            'beschrijving' => 'Een beschrijving van je probleem',
        ];
    }

    public function generateNewIncident() {
        $incident = new Incidenten();

        // Standaard dingen
        $incident->Hardware_ID = $this->hardware_id;
        $incident->Software_ID = $this->software_id;
        $incident->Probleembeschrijving = $this->beschrijving;
        $incident->Datum = date('Y-m-d');
        $incident->Tijd = date('H:i:s');
        $incident->Ingevuld_door = \Yii::$app->user->id;
        $incident->Type = $this->type;

        // Ingevuld tijdens vragenscript:
        $incident->Ingevuld_tijdens_vragenscript = json_encode([
            // Hoofdvragen
            'h1' => $this->h1,
            // Printer/scanner vragen
            'p1' => $this->p1,
            // Werkstationvragen
            'c1' => $this->c1,
            'c2' => $this->c2,
            'c3' => $this->c3,
            'c4' => $this->c4,
            // Overige vragen
        ]);

        return $incident;
    }
}