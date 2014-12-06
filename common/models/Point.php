<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property integer $id
 * @property integer $animal_id
 * @property integer $type
 * @property integer $user_id
 * @property integer $status
 * @property string $created_at
 */
class Point extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'point';
    }

    public $lat = 0;
    public $lng = 0;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['animal_id', 'type', 'user_id', 'status'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'animal_id' => 'Animal ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public static function findPolygon($topleft,$topright,$botleft,$botright, $typeSet = [], $animalSet=[]){

        // plz understand and forgive
        $sqlType = "";
        if (is_array($typeSet) && count($typeSet)>1){
            array_walk($typeSet,function(&$item){$item = (int)$item;});
            $sqlType = " and type IN (".implode(",",$typeSet ).")";
        }

        $sqlSet = "";
        if (is_array($animalSet) && count($animalSet)>1){
            array_walk($animalSet,function(&$item){$item = (int)$item;});
            $sqlSet = " and type IN (".implode(",",$animalSet ).")";
        }

        $result =  Yii::$app->db->createCommand("SELECT `point`.id,animal_id,type,user_id,`status`,created_at,X(coordinate) AS lng, Y(coordinate) AS lat FROM `point` INNER JOIN animal ON `animal`.`id` = animal_id  WHERE MBRWithin(`coordinate`,
                                        GeomFromText('
                                        Polygon((
                                        {$topleft[0]} {$topleft[1]},
                                        {$topright[0]} {$topright[1]},
                                        {$botright[0]} {$botright[1]},
                                        {$botleft[0]} {$botleft[1]},
                                        {$topleft[0]} {$topleft[1]}))')) = 1
                                        $sqlType
                                        $sqlSet
                                        LIMIT 0,100")->queryAll();

        return $result;
    }

    /*
    public function afterFind() {

        Yii::$app->db->createCommand("select  X(coordinate) AS lng, Y(coordinate) AS lat from `point` where ");

        parent::afterFind(); // TODO: Change the autogenerated stub
    }
    */


    public function afterSave($insert, $changedAttributes) {

        $coordinate = "GeomFromText('POINT({$this->lat} {$this->lng})')";
        Yii::$app->db->createCommand("UPDATE SET `coordinate`=$coordinate WHERE id={$this->id}")->queryOne();

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }


    public function select(){



    }


}

