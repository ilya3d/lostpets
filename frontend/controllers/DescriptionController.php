<?php

namespace frontend\controllers;

use common\models\Description;
use frontend\models\AddPointForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class DescriptionController extends Controller
{

    public function actionView($id){
        return $this->render('view', [
            'description' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Point model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Description the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Description::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd()
    {
        $model = new AddPointForm();

        if ($model->load(\Yii::$app->request->post()) && $id = $model->save()) {
            $this->redirect("/detail/{$id}");

        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }

    }

}
