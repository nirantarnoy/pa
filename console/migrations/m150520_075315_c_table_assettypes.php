<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_075315_c_table_assettypes extends Migration
{
    public function up()
    {
         $this->createTable('assettypes', [
              'recid'=>Schema::TYPE_PK,
              'typename'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'createdate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_typename', 'assettypes', 'typename');

    }

    public function down()
    {
        echo "m150520_075315_c_table_assettypes cannot be reverted.\n";

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
