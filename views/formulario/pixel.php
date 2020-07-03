<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form ActiveForm */
?>
<div class="pixel">
<script text="text/javascript">
    (function(){
        var setKickadsToken = function (token) {
            setCookie('ktoken', token, 1)
        }
        function findGetParameter(parameterName) {
            var result = null,
                tmp = [];
            location.search
                .substr(1)
                .split("&")
                .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                });
            return result;
        }
        var setCookie = function (cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";samesite=lax;path=/";
        }
        var ktoken = findGetParameter('ktoken');
        setKickadsToken(ktoken);
    })();
</script>
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
