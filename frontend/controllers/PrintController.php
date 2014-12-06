<?php

namespace frontend\controllers;

use common\models\Description;
use yii\web\Controller;
use Endroid\QrCode\QrCode;;

class PrintController extends Controller
{
    public function actionIndex($hash)
    {

        $description = new Description;
        $item = $description->findOne(['hash' => $hash]);




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
