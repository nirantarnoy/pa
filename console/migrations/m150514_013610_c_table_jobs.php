<?php

use yii\db\Schema;
use yii\db\Migration;

class m150514_013610_c_table_jobs extends Migration
{
    public function up()
    {
        $this->createTable('jobs', [
            'recid'=>Schema::TYPE_PK,
            'jobtype'=>Schema::TYPE_INTEGER.'(2)NOT NULL',
            'jobtitle'=>  Schema::TYPE_STRING,
            'jobaction'=>Schema::TYPE_INTEGER.'(2)',
            'jobdate'=>Schema::TYPE_DATETIME,
            'aproveddate'=>Schema::TYPE_DATETIME,
            'requestby'=>Schema::TYPE_INTEGER,
            'approvedby'=>Schema::TYPE_INTEGER,
            'jobstatus'=>Schema::TYPE_INTEGER,
            'startdate'=>Schema::TYPE_DATETIME,
            'enddate'=>Schema::TYPE_DATETIME,
            'operateby'=>Schema::TYPE_INTEGER,
            'comment'=>  Schema::TYPE_TEXT,
            
        ]);

    }

    public function down()
    {
        echo "m150514_013610_c_table_jobs cannot be reverted.\n";

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
