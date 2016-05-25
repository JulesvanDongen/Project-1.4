<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160525_155023_create_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => 'VARCHAR(32)',
            'password' => 'VARCHAR(45)',
            'authKey' => 'VARCHAR(32)',
            'accessToken' => 'VARCHAR(32)',
            'password_reset_token' => 'VARCHAR(255)',
        ]);

        $this->insert('user', [
                'username' => 'admin',
                'password' => 'admin',
            ]
        );

        $this->insert('user', [
                'username' => 'student',
                'password' => 'student',
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
