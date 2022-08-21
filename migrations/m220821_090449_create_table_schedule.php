<?php

use yii\db\Migration;

/**
 * Class m220821_090449_create_table_schedule
 */
class m220821_090449_create_table_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'day' => $this->string(40),
            'number' => $this->integer(),
            'groupe_id' => $this->integer(),
            'speciality_subject_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('schedule');
    }
}
