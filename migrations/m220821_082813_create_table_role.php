<?php

use yii\db\Migration;

/**
 * Class m220821_082813_create_table_role
 */
class m220821_082813_create_table_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('role', [
           'id' => $this->primaryKey(),
           'name' => $this->string(150)->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('role');
    }
}
