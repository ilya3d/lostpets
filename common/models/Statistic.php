<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property integer $total_completed
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_completed'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'total_completed' => 'Total Completed',
        ];
    }
}
