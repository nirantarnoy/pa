<?php

use yii\db\Schema;
use yii\db\Migration;

class m150521_040734_a_fk_users extends Migration
{
    public function up()
    {
        
          $this->addForeignKey('fk_user_groups', 'user', 'groupid', 'usergroups', 'recid','CASCADE','CASCADE');
          $this->addForeignKey('fk_user_dept', 'user', 'departmentid', 'departments', 'recid','CASCADE','CASCADE');
    }

    public function down()
    {
        echo "m150521_040734_a_fk_users cannot be reverted.\n";

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
