<?php

use yii\db\Migration;

/**
 * Class m220821_090035_create_table_speciality_subject
 */
class m220821_090035_create_table_speciality_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('speciality_subject', [
            'id' => $this->primaryKey(),
            'count_hour' => $this->integer(),
            'speciality_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'teacher_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('speciality_subject');
    }
}
