<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form ActiveForm */
?>

<script text="text/javascript">
    (function(action){

        // Funcion setear ktoken
        var setKickadsToken = function (token) {
            setCookie('ktoken', token, 1)
        }
    
        // Funcion de conversion
        var setKickadsConversion = function () {
            // IDENTIFICAR HTTPS / HTTPS
            var url = "https://www.kickadserver.mobi/convLog?ktoken=" + getCookie('ktoken');
            sendRequest(url, function(response){
                console.log(response);
            });
        }
    
        // fucntion para obtener parametros GET
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
    
        // Funcion para guardar cookie
        var setCookie = function (cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";samesite=lax;path=/";
        }
    
        // Funcion para obtener cookies
        var getCookie = function (cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    
        // Funcion para enviar request cuaquier explorador
        var sendRequest = function (url, callback) {
            var xhttp;
            if (window.XMLHttpRequest) {
                // code for modern browsers
                xhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    callback(this.responseText);
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    
    
        if(action === 'click') {
            // obtener ktoken y setearlo en la cookie
            var ktoken = findGetParameter('ktoken');
            setKickadsToken(ktoken);
        }
    
        if(action === 'conversion') {
            // Enviar conversion a kickads
            setKickadsConversion();
        }
    })('conversion');
</script>

<div class="pixel">

Gracias.

</div><!-- pixel -->
