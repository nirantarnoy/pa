<?php

use yii\db\Schema;
use yii\db\Migration;

class m150514_013620_c_table_jobdetails extends Migration
{
    public function up()
    {
        $this->createTable('jobdetails', [
            'recid'=>Schema::TYPE_PK,
            'jobid'=>  Schema::TYPE_INTEGER.'(10) NOT NULL',
            'jobname'=>  Schema::TYPE_STRING.'(255) NULL',
            'jobformat'=>  Schema::TYPE_STRING.'(255) NULL',
            'jobcondition'=>Schema::TYPE_STRING.'(255) NULL',
            'attatchfile'=>Schema::TYPE_STRING.'(255) NULL',
            'attatchtype'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef1'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef2'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef3'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef4'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef5'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef6'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef7'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef8'=>Schema::TYPE_STRING.'(255) NULL',
            'usdef9'=>Schema::TYPE_STRING.'(255) NULL',
        ]);
           
        $this->addForeignKey('fk_jobdetail_jobs', 'jobdetails', 'jobid', 'jobs', 'recid');
    }

    public function down()
    {
        echo "m150514_013620_c_table_jobdetails cannot be reverted.\n";

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
