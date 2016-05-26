<?php

use yii\db\Migration;

class m160526_151510_incidententabel_update extends Migration
{
    public function up()
    {
        $this->renameColumn('incidenten', 'Hardware_ID33', 'Hardware_ID');
        $this->renameColumn('incidenten', 'Software_ID33', 'Software_ID');
        $this->renameColumn('incidenten', 'Omschrijving', 'Probleembeschrijving');

        $this->alterColumn('incidenten', 'Probleembeschrijving', 'TEXT');

        $this->addColumn('incidenten', 'Ingevuld_tijdens_vragenscript', 'VARCHAR(255)');
        $this->addColumn('incidenten', 'Niet_oplosbaar', 'BOOLEAN');
        $this->addColumn('incidenten', 'Afgehandeld', 'BOOLEAN');
        $this->addColumn('incidenten', 'Prioriteit', 'INT');
        $this->addColumn('incidenten', 'Type', 'INT');

        $this->addColumn('incidenten', 'In_behandeling_door', 'INT');
        $this->addForeignKey(
            'incidenten_ibd_user_id_fk',
            'incidenten',
            'In_behandeling_door',
            'user',
            'id'
        );

        $this->addColumn('incidenten', 'Ingevuld_door', 'INT');
        $this->addForeignKey(
            'incidenten_ingvlddr_user_id_fk',
            'incidenten',
            'Ingevuld_door',
            'user',
            'id'
        );

        $this->insert(
            'incidenten',
            [
                'Hardware_ID' => 23,
                'Software_ID' => 4,
                'Ingevuld_door' => 1,
                'Probleembeschrijving' => 'Het programma doet het niet meer, geeft me foutmelding 3321',
                'Datum' => date('Y-m-d'),
                'Tijd' => date('H:i:s'),
            ]
        );

        $this->insert(
            'incidenten',
            [
                'Hardware_ID' => 27,
                'Ingevuld_door' => 1,
                'Probleembeschrijving' => 'De computer heeft alleen een zwart scherm, verder niks',
                'Datum' => date('Y-m-d'),
                'Tijd' => date('H:i:s'),
            ]
        );

        $this->insert(
            'incidenten',
            [
                'Hardware_ID' => 39,
                'Ingevuld_door' => 2,
                'Prioriteit' => 1,
                'In_behandeling_door' => 1,
                'Probleembeschrijving' => 'De lampjes gaan niet aan wanneer ik op de startknop druk',
                'Datum' => date('Y-m-d'),
                'Tijd' => date('H:i:s'),
            ]
        );
    }

    public function down()
    {
        $this->renameColumn('incidenten','Hardware_ID', 'Hardware_ID33');
        $this->renameColumn('incidenten','Software_ID', 'Software_ID33');
        $this->renameColumn('incidenten', 'Probleembeschrijving',  'Omschrijving');

        $this->alterColumn('incidenten', 'Omschrijving', 'VARCHAR(45)');

        $this->dropForeignKey('incidenten_ibd_user_id_fk', 'incidenten');
        $this->dropForeignKey('incidenten_ingvlddr_user_id_fk', 'incidenten');

        $this->dropColumn('incidenten', 'Ingevuld_tijdens_vragenscript');
        $this->dropColumn('incidenten', 'Afgehandeld');
        $this->dropColumn('incidenten', 'Niet_oplosbaar');
        $this->dropColumn('incidenten', 'In_behandeling_door');
        $this->dropColumn('incidenten', 'Ingevuld_door');
        $this->dropColumn('incidenten', 'Prioriteit');
        $this->dropColumn('incidenten', 'Type');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
