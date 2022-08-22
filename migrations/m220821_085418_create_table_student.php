<?php

use yii\db\Migration;

/**
 * Class m220821_085418_create_table_student
 */
class m220821_085418_create_table_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'ball' => $this->decimal(18,2),
            'user_id' => $this->integer(),
            'speciality_id' => $this->integer(),
            'groupe_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student');
    }
}
