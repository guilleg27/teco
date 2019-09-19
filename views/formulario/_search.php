<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormularioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formulario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre_completo') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'celular') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'ktoken') ?>

    <?php // echo $form->field($model, 'plan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
