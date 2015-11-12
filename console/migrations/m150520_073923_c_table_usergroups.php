<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_073923_c_table_usergroups extends Migration
{
    public function up()
    {
        $this->createTable('usergroups', [
             'recid'=>Schema::TYPE_PK,
             'groupname'=>  Schema::TYPE_STRING.'(255) NOT NULL',
             'description'=>  Schema::TYPE_STRING.'(255) NULL',
             'createdate'=>Schema::TYPE_DATETIME,
        ]);
        $this->createIndex('idx_groupname', 'usergroups', 'groupname');
    }

    public function down()
    {
        echo "m150520_073923_c_table_usergroups cannot be reverted.\n";

        return false;
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
