<?php

namespace frontend\controllers;

use common\models\Description;
use yii\web\Controller;
use yii\web\HttpException;

class PrintController extends Controller
{

    public $layout = 'print';

    public function actionIndex($hash)
    {

        $description = new Description;
        $item = $description->findOne(['hash' => $hash]);

        if(is_null($item))
            throw new HttpException(404);

        echo $this->render('index', ['description' => $item]);
    }

}
