<?php

use yii\db\Schema;
use yii\db\Migration;

class m150514_013129_c_table_organize extends Migration
{
    public function up()
    {
          $this->createTable('organize', [
              'recid'=>Schema::TYPE_PK,
              'organizename'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'createdate'=>Schema::TYPE_DATETIME,
              'updatedate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_organizename', 'organize', 'organizename');
          
    }

    public function down()
    {
        echo "m150514_013129_c_table_organize cannot be reverted.\n";

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
