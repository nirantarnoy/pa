<?php

use yii\db\Schema;
use yii\db\Migration;

class m150514_013142_c_table_sections extends Migration
{
    public function up()
    {
        $this->createTable('sections', [
              'recid'=>Schema::TYPE_PK,
              'sectionname'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'createdate'=>Schema::TYPE_DATETIME,
              'updatedate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_sectionname', 'sections', 'sectionname');
    }

    public function down()
    {
        echo "m150514_013142_c_table_sections cannot be reverted.\n";

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
