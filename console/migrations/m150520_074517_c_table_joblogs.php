<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_074517_c_table_joblogs extends Migration
{
    public function up()
    {
          $this->createTable('joblogs', [
             'recid'=>Schema::TYPE_PK,
             'jobid'=>  Schema::TYPE_INTEGER.'(10) NOT NULL',
             'logdate1'=>  Schema::TYPE_DATETIME,
            'logdate2'=>  Schema::TYPE_DATETIME,
            'logdate3'=>  Schema::TYPE_DATETIME,
            'logdate4'=>  Schema::TYPE_DATETIME,
             'logrem1'=>Schema::TYPE_STRING.'(255)NULL',
           'logrem2'=>Schema::TYPE_STRING.'(255)NULL',
           'logrem3'=>Schema::TYPE_STRING.'(255)NULL',
           'logrem4'=>Schema::TYPE_STRING.'(255)NULL',
             'devicename'=>Schema::TYPE_STRING.'(255)NULL',
           'ip'=>Schema::TYPE_STRING.'(255)NULL',
        ]);
        $this->createIndex('idx_jobid', 'joblogs', 'jobid');
    }

    public function down()
    {
        echo "m150520_074517_c_table_joblogs cannot be reverted.\n";

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
