<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_075323_c_table_assets extends Migration
{
    public function up()
    {
        $this->createTable('assets', [
              'recid'=>Schema::TYPE_PK,
              'assetname'=>  Schema::TYPE_STRING.'(100) NOT NULL',
              'description'=> Schema::TYPE_TEXT,
              'assettypeid'=>Schema::TYPE_INTEGER.'(10)NOT NULL',
              'createdate'=>Schema::TYPE_DATETIME,
          ]);
          $this->createIndex('idx_assetname', 'assets', 'assetname');
          $this->addForeignKey('fk_assets_assettypes', 'assets', 'assettypeid', 'assettypes', 'recid');

    }

    public function down()
    {
        echo "m150520_075323_c_table_assets cannot be reverted.\n";

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
