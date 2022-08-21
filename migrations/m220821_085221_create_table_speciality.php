<?php

use yii\db\Migration;

/**
 * Class m220821_085221_create_table_speciality
 */
class m220821_085221_create_table_speciality extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('speciality', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'codeword' => $this->string(2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('speciality');
    }
}
