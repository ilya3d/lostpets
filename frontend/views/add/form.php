<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Description */
/* @var $form ActiveForm */
?>
<div class="add-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'point_id') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model->point->type, 'type') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- add-form -->
