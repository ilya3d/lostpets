<?php

namespace frontend\controllers;

use frontend\models\AddPointForm;
use yii\web\Controller;


class AddController extends Controller
{
    public function actionIndex()
    {

        $model = new AddPointForm();

        
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            echo "good";
        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }

    }

}
