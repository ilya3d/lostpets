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
        //$filter->load(Yii::$app->request->post());

        $filter->load([
            'animal'=>[1,2,3],
            'type'=>[1,2,3],
            'topleft'=>[0,3],
            'botright'=>[100,100]
        ],'');

        if ($filter->validate())
           echo json_encode(Point::findPolygon($filter->topleft,$filter->botright,$filter->type,$filter->animal));
        else echo json_encode(['error'=>[$filter->firstErrors]]);

        //$filter->topleft



    }


}
