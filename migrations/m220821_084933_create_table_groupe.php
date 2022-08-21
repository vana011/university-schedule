<?php

use yii\db\Migration;

/**
 * Class m220821_084933_create_table_groupe
 */
class m220821_084933_create_table_groupe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('groupe', [
                'id' => $this->primaryKey(),
                'name' => $this->string(150)
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('groupe');
    }
}
