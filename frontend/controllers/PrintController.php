<?php

namespace frontend\controllers;

use common\models\Description;
use yii\web\Controller;

class PrintController extends Controller
{

    public $layout = 'print';

    public function actionIndex($hash)
    {

        $description = new Description;
        $item = $description->findOne(['hash' => $hash]);

        echo $this->render('index', ['description' => $item]);


//        $qrCode = new QrCode();
//        $qrCode->setText("Life is too short to be generating QR codes");
//        $qrCode->setSize(150);
//        $qrCode->setPadding(10);
//        $qrCode->save('filepath.png');


//        $model = new Description();
//
//        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['form', 'id' => $model->id]);
//        } else {
//            return $this->render('form', [
//                'model' => $model,
//            ]);
//        }

    }

}
