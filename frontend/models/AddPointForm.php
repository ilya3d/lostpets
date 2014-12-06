<?php

namespace frontend\models;

use common\models\Description;
use common\models\Point;
use Yii;
use yii\base\Model;

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
            [['title', 'description', 'subject', 'body','type','animal'], 'required'],
            // email has to be a valid email address
            ['photo','file','extensions' => ['png', 'jpg', 'gif'],'mimeTypes'=>'image/jpeg, image/png, image/gif'],
            ['email','email'],
            [['type','animal'],'integer']
        ];
    }

    public function save(){

        $description = new Description();
        $description->title = $this->title;
        $description->description = $this->description;
        $description->phone = $this->phone;
        $description->email = $this->email;

        $point = new Point();
        $point->animal_id = $this->animal;
        $point->type = $this->type;

        $point->lat = 1;
        $point->lng = 1;

        $point->status = 0;

        $idPoint = $point->save();
        $description->point_id = $idPoint;

        return $description->save();
    }


}
