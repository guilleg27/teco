<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formulario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_completo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'ktoken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan')->dropDownList([ '5GB' => '5GB', '8GB' => '8GB', '12GB' => '12GB', '20GB' => '20GB', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
