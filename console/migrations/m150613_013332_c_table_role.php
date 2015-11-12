<?php

use yii\db\Schema;
use yii\db\Migration;

class m150613_013332_c_table_role extends Migration
{
    public function up()
    {
              $this->createTable('roles', [
              'recid'=>Schema::TYPE_PK,
              'rolename'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'createdate'=>Schema::TYPE_DATETIME,
              'updatedate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_rolename', 'roles', 'rolename');
   
    }

    public function down()
    {
        echo "m150613_013332_c_table_role cannot be reverted.\n";

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
