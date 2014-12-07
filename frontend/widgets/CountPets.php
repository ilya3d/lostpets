<?php

namespace frontend\widgets;
use common\models\Point;

class CountPets extends \yii\bootstrap\Widget
{
    public static function widget($config = [])
    {
        $count = Point::find()->where('status = 3')->count();
        return $count;

    }
}
