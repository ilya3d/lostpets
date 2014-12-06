<?php

use yii\db\Schema;
use yii\db\Migration;

class m141206_112958_change_user_add_phone extends Migration
{
    public function safeUp()
    {
        $this->addColumn('user', 'phone', Schema::TYPE_STRING.'(50) NOT NULL DEFAULT \'\'');

        $this->addColumn('description', 'phone', Schema::TYPE_STRING.'(50) NOT NULL DEFAULT \'\'');
        $this->addColumn('description', 'email', Schema::TYPE_STRING.'(255) NOT NULL DEFAULT \'\'');

    }

    public function safeDown()
    {

        $this->dropColumn('description', 'phone');
        $this->dropColumn('description', 'email');
        $this->dropColumn('user', 'phone');

    }
}
