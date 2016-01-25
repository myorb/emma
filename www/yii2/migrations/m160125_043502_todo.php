<?php

use yii\db\Migration;

class m160125_043502_todo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('todo', [
            'id'              => $this->primaryKey(),
            'text'		      => $this->text(),
            'status'          => $this->integer(),
            'user_id'         => $this->integer(),
            'created_at'      => $this->integer(),
            'updated_at'      => $this->integer(),
        ],$tableOptions);
    }

    public function down()
    {
        $this->dropTable('todo');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
