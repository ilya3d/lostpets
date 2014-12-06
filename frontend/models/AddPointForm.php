<?php

namespace frontend\models;

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
            [['title', 'description', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['photo','file','extensions' => ['png', 'jpg', 'gif'],'mimeTypes'=>'image/jpeg, image/png, image/gif'],
            ['email','email'],

            // verifyCode needs to be entered correctly
        ];
    }

    public function save(){

        return true;
    }


}
