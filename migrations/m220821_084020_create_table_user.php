<?php

use yii\db\Migration;

/**
 * Class m220821_084020_create_table_user
 */
class m220821_084020_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
           'id' => $this->primaryKey(),
           'email' => $this->string(60)->notNull(),
            'password' => $this->text()->notNull(),
            'authKey' => $this->text()->notNull(),
            'accessToken' => $this->text()->notNull(),
            'phone' => $this->string(30),
            'role_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
