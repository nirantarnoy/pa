<?php

use yii\db\Schema;
use yii\db\Migration;

class m150514_013152_c_table_departments extends Migration
{
    public function up()
    {
        $this->createTable('departments', [
              'recid'=>Schema::TYPE_PK,
              'departmentname'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'sectionid'=> Schema::TYPE_INTEGER.('(4) NOT NULL'),
              'createdate'=>Schema::TYPE_DATETIME,
              'updatedate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_departmentname', 'departments', 'departmentname');
          $this->addForeignKey('fk_sectionid', 'departments', 'sectionid', 'sections', 'recid','CASCADE','CASCADE');
    }

    public function down()
    {
        echo "m150514_013152_c_table_departments cannot be reverted.\n";

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
