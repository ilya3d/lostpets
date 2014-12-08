<?php

namespace frontend\controllers;

use common\models\Description;
use common\models\Point;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\rest\Controller;


class RestController extends ActiveController
{
    public $modelClass = 'common\models\Description';

    public function actions() {
        $actions = parent::actions();

        // отключаем crud
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['update']);

        $actions['index']['prepareDataProvider'] = function() {
            $model = Description::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $model,
                'pagination' => array(
                    'pageSizeParam' => 'per_page'
                )
            ]);

            return $dataProvider;

        };



        return $actions;
    }

}
