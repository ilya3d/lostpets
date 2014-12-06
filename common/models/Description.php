<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "description".
 *
 * @property integer $id
 * @property integer $point_id
 * @property string $title
 * @property string $description
 */
class Description extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['point_id'], 'integer'],
            [['title', 'description'], 'required'],
            [['description'], 'string'],
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
            'point_id' => 'Point ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
