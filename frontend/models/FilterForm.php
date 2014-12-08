<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class FilterForm extends Model
{
    public $animal;
    public $type;
    public $topleft;
    public $botright;

    public function rules()
    {
        return [
            [['animal','type','topleft','botright'],'safe'],
            [['animal'],function($attribute, $params){
                if(!is_array($this->animal)){
                    $this->addError('animal','is not array');
                }
            }],
            [['type'],function($attribute, $params){
                if(!is_array($this->type)){
                    $this->addError('type','is not array');
                }
            }],
            [['topleft'],function($attribute, $params){
                if(!is_array($this->topleft) || count($this->topleft)!=2){
                    $this->addError('topleft','is not array');
                }
            }],
            [['botright'],function($attribute, $params){
                if(!is_array($this->botright) || count($this->botright)!=2){
                    $this->addError('botright','is not array');
                }
            }],
        ];
    }

}
