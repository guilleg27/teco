<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form ActiveForm */
?>

<div class="pixel">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombre_completo') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'celular') ?>
        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'ktoken') ?>
        <?= $form->field($model, 'plan') ?>
        <?= $form->field($model, 'pais') ?>
        <?= $form->field($model, 'ciudad') ?>
        <?= $form->field($model, 'carrier') ?>
        <?= $form->field($model, 'pubId') ?>
        <?= $form->field($model, 'providerId') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- pixel -->
