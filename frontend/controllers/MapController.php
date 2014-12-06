<?php

namespace frontend\controllers;

use common\models\Point;
use frontend\models\FilterForm;
use Yii;
use yii\web\Controller;

class MapController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionFilter(){

        $filter = new FilterForm();
        $filter->setAttributes(Yii::$app->request->post());

        if ($filter->validate())
           echo json_encode(Point::findPolygon($filter->topleft,$filter->botright,$filter->type,$filter->animal));
        else echo json_encode(['error'=>[$filter->firstErrors]]);

        //$filter->topleft



    }


}
