<?php

use yii\db\Migration;

/**
 * Class m220821_085702_create_table_subject
 */
class m220821_085702_create_table_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subject', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subject');
    }
}
