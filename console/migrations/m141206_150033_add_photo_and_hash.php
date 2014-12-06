<?php

use yii\db\Schema;
use yii\db\Migration;

class m141206_150033_add_photo_and_hash extends Migration
{
    public function safeUp()
    {

        $this->addColumn('description', 'photo', Schema::TYPE_STRING.'(255) NOT NULL DEFAULT \'\'');
        $this->addColumn('description', 'qrcode', Schema::TYPE_STRING.'(255) NOT NULL DEFAULT \'\'');
        $this->addColumn('description', 'hash', Schema::TYPE_STRING.'(32) NOT NULL DEFAULT \'\'');


    }

    public function safeDown()
    {

        $this->dropColumn('description', 'photo');
        $this->dropColumn('description', 'qrcode');
        $this->dropColumn('description', 'hash');

    }
}
