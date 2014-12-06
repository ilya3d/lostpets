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
            return $this->redirect(['/']);
        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }

    }

}
