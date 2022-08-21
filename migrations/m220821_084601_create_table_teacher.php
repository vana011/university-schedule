<?php

use yii\db\Migration;

/**
 * Class m220821_084601_create_table_teacher
 */
class m220821_084601_create_table_teacher extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('teacher', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'address' => $this->string(150),
            'experience' => $this->integer(),
            'salary' => $this->decimal(18,2),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('teacher');
    }
}
