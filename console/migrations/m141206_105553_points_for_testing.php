<?php

use yii\db\Schema;
use yii\db\Migration;

class m141206_105553_points_for_testing extends Migration
{
    public function up()
    {

        /* animals */
        $this->insert('animal', ['id'    => 1, 'title' => 'Cat']);
        $this->insert('animal', ['id'    => 2, 'title' => 'Dog']);
        $this->insert('animal', ['id'    => 3, 'title' => 'Other pet']);

        /* point #1 */

//        $this->insert('point', [
//            'id'    => 1,
//            'animal_id' => 1,
//            'type' => 2,
//            'user_id' => 1,
//            'coordinate' => "GeomFromText( ' POINT(32.042570 54.782864) ' )",
//            'status'    => 1,
//        ]);

        $this->execute('
            INSERT INTO `point`
                    (`id`, `animal_id`, `type`, `user_id`, `coordinate`, `status`)
            VALUES  (1, 1, 2, 1, GeomFromText( \' POINT(32.042570 54.782864) \' ), 1)
        ');

        $this->insert('description', [

            'point_id' => 1,
            'title' => 'К-Маркса 12',
            'description' => 'Сюда едет пицца',

        ]);

        /* point #2 */

//        $this->insert('point', [
//            'id'    => 2,
//            'animal_id' => 2,
//            'type' => 4,
//            'user_id' => 1,
//            'coordinate' => "GeomFromText( ' POINT(32.054543 54.777289) ' )",
//            'status'    => 1,
//        ]);

        $this->execute('
            INSERT INTO `point`
                    (`id`, `animal_id`, `type`, `user_id`, `coordinate`, `status`)
            VALUES  (2, 2, 4, 1, GeomFromText( \' POINT(32.054543 54.777289) \' ), 1)
        ');

        $this->insert('description', [

            'point_id' => 2,
            'title' => 'ул. Исаковского',
            'description' => 'Здесь стоит слоник.',

        ]);


        /* point #3 */

//        $this->insert('point', [
//            'id'    => 3,
//            'animal_id' => 3,
//            'type' => 8,
//            'user_id' => 1,
//            'coordinate' => "GeomFromText( ' POINT(31.885929 54.912541) ' )",
//            'status'    => 1,
//        ]);

        $this->execute('
            INSERT INTO `point`
                    (`id`, `animal_id`, `type`, `user_id`, `coordinate`, `status`)
            VALUES  (3, 3, 8, 1, GeomFromText( \' POINT(31.885929 54.912541) \' ), 1)
        ');

        $this->insert('description', [

            'point_id' => 3,
            'title' => 'Здесь Мазай поляков топил',
            'description' => 'болотце',

        ]);

    }

    public function down()
    {

        $this->truncateTable('description');
        $this->truncateTable('point');
        $this->truncateTable('animal');

    }
}
