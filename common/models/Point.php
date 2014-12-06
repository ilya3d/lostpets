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
 * @property string $coordinate
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['animal_id', 'type', 'user_id', 'status'], 'integer'],
            [['coordinate'], 'required'],
            [['coordinate'], 'string'],
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
            'coordinate' => 'Coordinate',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
