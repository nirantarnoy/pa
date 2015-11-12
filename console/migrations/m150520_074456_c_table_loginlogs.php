<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_074456_c_table_loginlogs extends Migration
{
    public function up()
    {
         $this->createTable('loginlogs', [
             'recid'=>Schema::TYPE_PK,
             'userid'=>  Schema::TYPE_INTEGER.'(10) NOT NULL',
             'logindate'=>  Schema::TYPE_DATETIME,
             'logoutdate'=>  Schema::TYPE_DATETIME,
             'device'=>  Schema::TYPE_STRING,
             'ip'=>  Schema::TYPE_STRING,
            
        ]);
        $this->createIndex('idx_userid', 'loginlogs', 'userid');
    }

    public function down()
    {
        echo "m150520_074456_c_table_loginlogs cannot be reverted.\n";

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
