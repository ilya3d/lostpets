<?php

namespace frontend\models;

use common\models\Description;
use common\models\Point;
use Endroid\QrCode\QrCode;
use Exception;
use Yii;
use yii\base\Model;
use yii\web\ServerErrorHttpException;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class AddPointForm extends Model
{
    public $title;
    public $description;
    public $photo;
    public $type;
    public $animal;
    public $phone;
    public $email;
    public $point;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['title', 'description', 'subject', 'body','type','animal','phone'], 'required'],
            // email has to be a valid email address
            ['photo','file','extensions' => ['png', 'jpg', 'gif'],'mimeTypes'=>'image/jpeg, image/png, image/gif'],
            ['email','email'],
            [['type','animal'],'integer']
        ];
    }

    public function save(){

        $file = UploadedFile::getInstance($this,'photo');
        $filename = '';
        if ($file){

            $dir = Yii::getAlias('@uploads');
            if (!is_dir($dir)){
                mkdir($dir, 0755, true);
            }

            $ext = end(explode(".", $file->name));

            $filename =  Yii::$app->security->generateRandomString('20') . ".{$ext}";
            try {
                $file->saveAs($dir . '/' . $filename);
            } catch(Exception $e) {
                new ServerErrorHttpException("Bad file");
            }
        }

        $description = new Description();
        $description->title = $this->title;
        $description->description = $this->description;
        $description->phone = $this->phone;
        $description->email = $this->email;
        $description->photo = $filename;

        $point = new Point();
        $point->animal_id = $this->animal;

        $point->type = $this->type;

        $point->lat = 1;
        $point->lng = 1;

        $point->status = 0;

        $idPoint = $point->save();
        $description->point_id = $idPoint;
        $description->hash = Yii::$app->security->generateRandomString('20');

        $description->save();

        $qrCode = new QrCode();
        $qrCode->setText("/detail/".$description->id);
        $qrCode->setSize(150);
        $qrCode->setPadding(10);

        $qrName = Yii::$app->security->generateRandomString('20').'.png';

        $qrCode->save($qrName);
        $description->qrcode = $qrName;
        $description->save();

        return $description->id;
    }


}
