<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


\yii\bootstrap\BootstrapAsset::register($this);
/* @var $this yii\web\View */
/* @var $model \frontend\models\AddPointForm */
/* @var $form ActiveForm */
?>
<div class="add-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'title')->textInput() ?>
        <?= $form->field($model, 'description')->textarea() ?>
        <?= $form->field($model , 'photo')->fileInput() ?>
        <?= $form->field($model , 'type')->dropDownList(\common\models\Point::getTypeList()) ?>
        <?= $form->field($model , 'animal')->dropDownList(\common\models\Animal::getAnimalList()) ?>
        <?= $form->field($model , 'email')->textInput()->label('E-mail'); ?>
        <?= $form->field($model , 'phone')->textInput(); ?>
        <?= $form->field($model , 'point')->textInput(); ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- add-form -->

