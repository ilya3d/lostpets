<?php

namespace frontend\controllers;

use common\models\Description;
use yii\web\Controller;


class AddController extends Controller
{
    public function actionIndex()
    {

        $model = new Description();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['form', 'id' => $model->id]);
        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }

    }

}
