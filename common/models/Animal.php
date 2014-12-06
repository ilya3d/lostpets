<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property integer $id
 * @property string $title
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal';
    }

    public static function  getAnimalList(){
        return [
            1 => 'Dog',
            2 => 'Cat',
            3 => 'Other'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
}
