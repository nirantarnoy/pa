<?php

use yii\db\Schema;
use yii\db\Migration;

class m150613_013357_c_table_assign_role extends Migration
{
    public function up()
    {
           $this->createTable('assignroles', [
              'recid'=>Schema::TYPE_PK,
              'description'=> Schema::TYPE_TEXT,
              'userid'=> Schema::TYPE_INTEGER.('(4) NOT NULL'),
              'departmentid'=> Schema::TYPE_INTEGER.('(4) NOT NULL'),
              'roleid'=> Schema::TYPE_INTEGER.('(4) NOT NULL'),
              'createdate'=>Schema::TYPE_DATETIME,
              'updatedate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_description', 'assignroles', 'description');
          $this->addForeignKey('fk_userid', 'assignroles', 'userid', 'users', 'recid', 'CASCADE', 'CASCADE');
          $this->addForeignKey('fk_departmentid', 'assignroles', 'departmentid', 'departments', 'recid', 'CASCADE', 'CASCADE');
          $this->addForeignKey('fk_roleid', 'assignroles', 'roleid', 'roles', 'recid', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150613_013357_c_table_assign_role cannot be reverted.\n";

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
