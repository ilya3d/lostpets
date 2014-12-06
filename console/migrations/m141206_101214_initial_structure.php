<?php

use yii\db\Schema;
use yii\db\Migration;

class m141206_101214_initial_structure extends Migration
{
    public function safeUp()
    {

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('animal', [
            'id'    => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
        ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM'
        );

        $this->createTable('statistic', [
                'total_completed' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 0',
            ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM'
        );

        $this->createTable('description', [
                'id'    => Schema::TYPE_PK,
                'point_id' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 0',
                'title' => Schema::TYPE_STRING . '(255) NOT NULL',
                'description' => Schema::TYPE_TEXT.' NOT NULL DEFAULT \'\'',
            ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM'
        );


        $this->createTable('point', [

            'id'        => Schema::TYPE_PK,
            'animal_id' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 0',
            'type'      => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 1',
            'user_id'   => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 0',
            'coordinate' => 'point NOT NULL',
            'status'    => 'tinyint(1) UNSIGNED NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM'
        );

        $this->execute("ALTER TABLE `point` ADD SPATIAL INDEX ( `coordinate` ) ;");
        $this->createIndex('index4descr_point', 'description', 'point_id');
        $this->createIndex('index4point_animal', 'point', 'animal_id');
        $this->createIndex('index4point_type', 'point', 'type');
        $this->createIndex('index4point_status', 'point', 'status');


    }

    public function safeDown()
    {

        $this->dropIndex('index4descr_point', 'description');
        $this->dropIndex('index4point_animal', 'point');
        $this->dropIndex('index4point_type', 'point');
        $this->dropIndex('index4point_status', 'point');

        $this->dropTable('animal');
        $this->dropTable('statistic');
        $this->dropTable('description');
        $this->dropTable('point');

    }
}
