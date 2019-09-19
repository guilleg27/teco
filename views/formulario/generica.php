﻿<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Portabilidad Personal</title>
    <meta name="description" content="Ahora podés conservar tu número y pagar tu plan mucho menos sin cambiar el número. Pasate a Personal con la Portabilidad numérica y conservá tu número de celular presentando sólo tu DNI y siendo titular de cuenta de manera gratuita." />
    <meta name="keywords" content="Personal, GB, pasar, teléfono, plan, número, portabilidad, pasate" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/portabilidad/img/favicon.ico') ?>" />
    <link rel="icon" type="image/png" href="<?= Url::to('@web/portabilidad/img/favicon.png') ?>" />
    <link rel="apple-touch-icon" href="<?= Url::to('@web/portabilidad/img/favicon.png') ?>" />

    <!-- Css -->
    <link href="<?= Url::to('@web/portabilidad/css/style.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= Url::to('@web/portabilidad/css/bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= Url::to('@web/portabilidad/css/plugins/animate.css') ?>" rel="stylesheet" type="text/css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body class="wow-animate">

    <!-- Site preloader -->
    <section id="preloader">
        <div class="site-spinner"></div>
    </section>
    <!-- End Site preloader -->

    <!-- Page Wraper -->
    <div id="page-wraper">

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-inner">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html">
                        <img class="logo-dark" src="<?= Url::to('@web/portabilidad/img/logo-dark.png') ?>" alt="Personal" />
                        <img class="logo-light" src="<?= Url::to('@web/portabilidad/img/logo-light.png') ?>" alt="Personal" />
                    </a>
                </div>
                <!-- End Logo -->
            </div>
        </header>
        <!-- End Header -->

        <!-- Page Intro -->
        <section id="inner-intro" class="container-fluid no-padding highlight portabilidad" data-background-img="img/fondo-persona-desktop.jpg">
                            <div class="intro-content">
                        <div class="intro-content-inner">
                           <h2 class="lefto title-pasate" style="margin-bottom: 0px; color: white">Pasate a Personal</h2>
                            <h1 class="intro-title lefto" style="font-weight: 800; color: white"><strong style="color: #FFD517">50%</strong> de descuento</h1>
                                <h4 class="alt-title lefto intro-sub-title" style="color: white">por 12 meses</h4>
                        </div>
                    </div>
        </section>
        
        <!-- End Page Intro -->
        
             <section class="section-padding" id="pricing" style="padding-bottom: 0px;">
            <div class="container text-center">
                <h1 class="" style="font-weight: 500;">Elegí tu plan</h1>
                <h5 class="alt-title intro-sub-title">¡Envianos tus datos para aprovechar la promoción!</h5>
                <div class="row">

                    <div data-wow-delay="0.1s" data-wow-duration="2s" class="col-md-6 col-lg-3 mb-sm-30 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="pricing-box highlight">
                            <div class="pricing-title">
                                <h1 class="alt-title" style="font-size: 30px; color: #00B7D7;">Plan 5GB</h1>
                            </div>
                                <div class="tapaform" id="form5gb" style="display:none;">
                                 <a style="color: #555555; background-color: transparent;position: absolute;left: 85%;z-index: 20;" class="btn btn-md btn-color" onclick="hide5gb()">x</a>
                        <form id="contact" class="contact-form row" role="form">
                        <div class="col-md-12 text-center" style="height: 42px">
                                <h5 class="successContent5GB" style="color: #5cb45d; font-size: 14px">
                                    <i class="fa fa-check left" style="color: #5cb45d;"></i>¡Tu mensaje se envió correctamente!
                                </h5>
                                <h5 class="errorContent5GB" style="color: #e1534f; font-size: 14px">
                                    <i class="fa fa-exclamation-circle left"></i>Hubo un problema. Verificá que tus datos estén correctos.
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Nombre completo: *</label>
                                    <input class="input-md form-full" id="form-name" type="text" name="form-name" placeholder="María Perez" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="email">Email: *</label>
                                    <input class="input-md form-full" id="form-email" type="email" name="form-email" placeholder="nombre@dominio.com" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Celular: *</label>
                                    <input class="input-md form-full" id="form-phone" maxlength="12" type="tel" name="form-phone" placeholder="011 3456 789" required />
                                </div>
                            </div>
                            <input class="input-md form-full" type="hidden" id="form-plan" name="form-plan" value="5GB">
                            <input class="input-md form-full" type="hidden" id="form-ktoken" name="form-ktoken" value="ktoken">
                            <input class="input-md form-full" type="hidden" id="form-gen" name="form-gen" value="gen1">
                             <div class="col-md-12">
                              <div class="form-field-wrapper text-left">
                                <p>*Campos obligatorios</p>
                            </div>    
                            </div>
                            <div class="col-md-12">
                                <button class="btn-contact-submit btn btn-md btn-color" type="submit" id="form-submit" name="submit">Solicitar</button>
                            </div>

                        </form>
                            </div>
                               <div>
                                <div class="pricing-features">
                                    <ul>
                                        <li style="text-decoration: line-through; font-size: 30px;">$1020</li>
                                        <li><div class="pricing-price">
                                    <p>
                                        <span class="dollar">$</span>
                                        <span class="pricing-price-lg" style="font-weight: 600;">510</span>
                                        <span class="pricing-price-sm">/ mes</span>
                                    </p>
                                </div></li>
                                        <li>Whatsapp gratis</li>
                                        <li>Llamadas ilimitadas a <strong>cualquier</strong> compañía a todo el país</li>
                                        <li>SMS ilimitados a cualquier compañía</li>
                                    </ul>
                                </div>
                                <div class="pricing-button">
                                    <a style="color: white" class="btn btn-md btn-color" onclick="show5gb()">¡Lo quiero!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-wow-delay="0.2s" data-wow-duration="2s" class="col-md-6 col-lg-3 mb-sm-30 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn;">
                        <div class="pricing-box highlight">
                            <div class="pricing-title">
                                <h1 class="alt-title" style="font-size: 30px; color: #00B7D7;">Plan 8GB</h1>
                            </div>
                           <div class="tapaform" id="form8gb" style="display:none;">
                           <a style="color: #555555; background-color: transparent;position: absolute;left: 85%;z-index: 20;" class="btn btn-md btn-color" onclick="hide8gb()">x</a>
                        <form id="contact" class="contact-form row" role="form">
                        <div class="col-md-12 text-center" style="height: 42px">
                                <h5 class="successContent8GB" style="color: #5cb45d; font-size: 14px">
                                    <i class="fa fa-check left" style="color: #5cb45d;"></i>¡Tu mensaje se envió correctamente!
                                </h5>
                                <h5 class="errorContent8GB" style="color: #e1534f; font-size: 14px">
                                    <i class="fa fa-exclamation-circle left"></i>Hubo un problema. Verificá que tus datos estén correctos.
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Nombre completo: *</label>
                                    <input class="input-md form-full" id="form-name" type="text" name="form-name" placeholder="María Perez" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="email">Email: *</label>
                                    <input class="input-md form-full" id="form-email" type="email" name="form-email" placeholder="nombre@dominio.com" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Celular: *</label>
                                    <input class="input-md form-full" id="form-phone" maxlength="12" type="tel" name="form-phone" placeholder="011 3456 789" required />
                                </div>
                            </div>
                            <input class="input-md form-full" type="hidden" id="form-plan" name="form-plan" value="8GB">
                            <input class="input-md form-full" type="hidden" id="form-ktoken" name="form-ktoken" value="ktoken">
                             <div class="col-md-12">
                              <div class="form-field-wrapper text-left">
                                <p>*Campos obligatorios</p>
                            </div>    
                            </div>
                            <div class="col-md-12">
                                <button class="btn-contact-submit btn btn-md btn-color" type="submit" id="form-submit" name="submit">Solicitar</button>
                            </div>

                        </form>
                            </div>
                              <div>
                                <div class="pricing-features">
                                    <ul>
                                        <li style="text-decoration: line-through; font-size: 30px;">$1500</li>
                                        <li><div class="pricing-price">
                                    <p>
                                        <span class="dollar">$</span>
                                        <span class="pricing-price-lg" style="font-weight: 600;">750</span>
                                        <span class="pricing-price-sm">/ mes</span>
                                    </p>
                                </div></li>
                                        <li>Whatsapp gratis</li>
                                        <li>Llamadas ilimitadas a <strong>cualquier</strong> compañía a todo el país</li>
                                        <li>SMS ilimitados a cualquier compañía</li>
                                    </ul>
                                </div>
                                <div class="pricing-button">
                                    <a style="color: white" class="btn btn-md btn-color" onclick="show8gb()">¡Lo quiero!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-wow-delay="0.3s" data-wow-duration="2s" class="col-md-6 col-lg-3 mb-sm-30 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: fadeIn;">
                        <div class="pricing-box highlight">
                            <div class="pricing-title">
                                <h1 class="alt-title" style="font-size: 30px; color: #00B7D7;">Plan 12GB</h1>
                            </div>
                        <div class="tapaform" id="form12gb" style="display:none;">
                        <a style="color: #555555; background-color: transparent;position: absolute;left: 85%;z-index: 20;" class="btn btn-md btn-color" onclick="hide12gb()">x</a>
                        <form id="contact" class="contact-form row" role="form">
                        <div class="col-md-12 text-center" style="height: 42px">
                                <h5 class="successContent12GB" style="color: #5cb45d; font-size: 14px">
                                    <i class="fa fa-check left" style="color: #5cb45d;"></i>¡Tu mensaje se envió correctamente!
                                </h5>
                                <h5 class="errorContent12GB" style="color: #e1534f; font-size: 14px">
                                    <i class="fa fa-exclamation-circle left"></i>Hubo un problema. Verificá que tus datos estén correctos.
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Nombre completo: *</label>
                                    <input class="input-md form-full" id="form-name" type="text" name="form-name" placeholder="María Perez" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="email">Email: *</label>
                                    <input class="input-md form-full" id="form-email" type="email" name="form-email" placeholder="nombre@dominio.com" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Celular: *</label>
                                    <input class="input-md form-full" id="form-phone" maxlength="12" type="tel" name="form-phone" placeholder="011 3456 789" required />
                                </div>
                            </div>
                            <input class="input-md form-full" type="hidden" id="form-plan" name="form-plan" value="12GB">
                            <input class="input-md form-full" type="hidden" id="form-ktoken" name="form-ktoken" value="ktoken">
                             <div class="col-md-12">
                              <div class="form-field-wrapper text-left">
                                <p>*Campos obligatorios</p>
                            </div>    
                            </div>
                            <div class="col-md-12">
                                <button class="btn-contact-submit btn btn-md btn-color" type="submit" id="form-submit" name="submit">Solicitar</button>
                            </div>

                        </form>
                            </div>
                            <div class="pricing-features">
                                <ul>
                                    <li style="text-decoration: line-through; font-size: 30px;">$1900</li>
                                    <li><div class="pricing-price">
                                <p>
                                    <span class="dollar">$</span>
                                    <span class="pricing-price-lg" style="font-weight: 600;">950</span>
                                    <span class="pricing-price-sm">/ mes</span>
                                </p>
                            </div></li>
                                    <li>Whatsapp gratis</li>
                                    <li>Llamadas ilimitadas a <strong>cualquier</strong> compañía a todo el país</li>
                                    <li>SMS ilimitados a cualquier compañía</li>
                                </ul>
                            </div>
                            <div class="pricing-button">
                                    <a style="color: white" class="btn btn-md btn-color" onclick="show12gb()">¡Lo quiero!</a>
                            </div>
                        </div>
                    </div>
                    
                    <div data-wow-delay="0.4s" data-wow-duration="2s" class="col-md-6 col-lg-3 mb-sm-30 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: fadeIn;">
                           <div class="pricing-box highlight">
                            <div class="pricing-title">
                                <h1 class="alt-title" style="font-size: 30px; color: #00B7D7;">Plan 20GB</h1>
                            </div>
                            <div class="tapaform" id="form20gb" style="display:none;">
                            <a style="color: #555555; background-color: transparent;position: absolute;left: 85%;z-index: 20;" class="btn btn-md btn-color" onclick="hide20gb()">x</a>
                        <form id="contact" class="contact-form row" role="form" method="post">
                        <div class="col-md-12 text-center" style="height: 42px">
                                <h5 class="successContent20GB" style="color: #5cb45d; font-size: 14px">
                                    <i class="fa fa-check left" style="color: #5cb45d;"></i>¡Tu mensaje se envió correctamente!
                                </h5>
                                <h5 class="errorContent20GB" style="color: #e1534f; font-size: 14px">
                                    <i class="fa fa-exclamation-circle left"></i>Hubo un problema. Verificá que tus datos estén correctos.
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Nombre completo: *</label>
                                    <input class="input-md form-full" id="form-name" type="text" name="form-name" placeholder="María Perez" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="email">Email: *</label>
                                    <input class="input-md form-full" id="form-email" type="email" name="form-email" placeholder="nombre@dominio.com" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field-wrapper text-left">
                                   <label for="name">Celular: *</label>
                                    <input class="input-md form-full" id="form-phone" maxlength="12" type="tel" name="form-phone" placeholder="011 3456 789" required />
                                </div>
                            </div>
                            <input class="input-md form-full" type="hidden" id="form-plan" name="form-plan" value="20GB">
                            <input class="input-md form-full" type="hidden" id="form-ktoken" name="form-ktoken" value="ktoken">
                             <div class="col-md-12">
                              <div class="form-field-wrapper text-left">
                                <p>*Campos obligatorios</p>
                            </div>    
                            </div>
                            <div class="col-md-12">
                                <button class="btn-contact-submit btn btn-md btn-color" type="submit" id="form-submit" name="submit">Solicitar</button>
                            </div>

                        </form>
                            </div>
                            <div class="pricing-features">
                                <ul>
                                    <li style="text-decoration: line-through; font-size: 30px;">$2400</li>
                                    <li><div class="pricing-price">
                                <p>
                                    <span class="dollar">$</span>
                                    <span class="pricing-price-lg" style="font-weight: 600; font-size: 4em;">1200</span>
                                    <span class="pricing-price-sm">/ mes</span>
                                </p>
                            </div></li>
                                    <li>Whatsapp gratis</li>
                                    <li>Llamadas ilimitadas a <strong>cualquier</strong> compañía a todo el país</li>
                                    <li>SMS ilimitados a cualquier compañía</li>
                                </ul>
                            </div>
                            <div class="pricing-button">
                                    <a style="color: white" class="btn btn-md btn-color" onclick="show20gb()">¡Lo quiero!</a>
                                </div>
                        </div>
                    </div>                    

                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="section-padding" id="pasos" style="padding-bottom: 0px;">
            <div class="container">
                <div class="rows text-center">
                    <h1 class="mb-60" style="font-weight: 500;">¿Cómo es el proceso de portabilidad de mi línea?</h1>
                </div>
                <div class="row">
                    <div data-wow-delay="0.1s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-phone" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">Te llamamos</p>
                        </div>
                    </div>
                    <div data-wow-delay="0.2s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-user" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">Nos envías la foto de tu DNI</p>
                        </div>
                    </div>
                    <div data-wow-delay="0.3s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-asterisk" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">Te enviamos un Pin de activación</p>
                        </div>
                    </div>
                    <div data-wow-delay="0.4s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-envelope" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">Recibís en tu casa el Chip gratis</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        <section class="section-padding" id="beneficios" style="background-color: #f4f4f4; margin-bottom: 50px; margin-top: 50px;">
            <div class="container">
                <div class="rows text-center">
                    <h1 class="mb-60" style="font-weight: 500;">Nuestros beneficios</h1>
                </div>
                <div class="row">
                    <div data-wow-delay="0.1s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-phone-square" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px"><strong>Llamadas ilimitadas</strong> a todas las compañías, a todo el país</p>
                        </div>
                    </div>
                    <div data-wow-delay="0.2s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-comments-o" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">WhatsApp <strong>Gratis</strong><br>y SMS <strong>ilimitados</strong></p>
                        </div>
                    </div>
                    <div data-wow-delay="0.3s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-wifi" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">La red de internet 4G<br><strong>más rápida</strong> del país</p>
                        </div>
                    </div>
                    <div data-wow-delay="0.4s" data-wow-duration="2s" class="col-md-3 mb-10 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="content-box" style="text-align: center">
                            <div class="alt-icon-color">
                                <i class="fa fa-dollar" style="font-size: 60px;"></i>
                            </div>
                            <p style="font-size: 16px">Si sos <strong>Cliente Fibertel</strong> ahorrá $500 en tu factura de internet</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        
          <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #0081BA;">
          <h4 class="modal-title">Legales</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="font-size: 12px">
         PROMOCIÓN DE ALCANCE NACIONAL, VÁLIDA DESDE EL 02/09/2019 HASTA EL 30/09/2019, EXCLUSIVAMENTE PARA CLIENTES CON DNI. OFERTA DE DESCUENTO: VÁLIDA ÚNICAMENTE PARA LA MODALIDAD DE PORTABILIDAD CON LOS PLANES CONEXIÓN TOTAL CONTROL PORTA M, CONEXIÓN CONTROL FAMILIA L, BLACK CONEXIÓN TOTAL LIBRE 1XL Y BLACK CONEXIÓN TOTAL LIBRE 4XL (PRECIOS REGULARES DE LOS ABONOS MENSUALES $1.020; $1.500; $1.900 Y $2.400, RESPECTIVAMENTE). EL CLIENTE ACCEDE AL 50% DE DESCUENTO SOBRE EL VALOR DEL PLAN CONEXIÓN TOTAL CONTROL PORTA M, CONEXIÓN CONTROL FAMILIA L, BLACK CONEXIÓN TOTAL LIBRE 1XL Y BLACK CONEXIÓN TOTAL LIBRE 4XL DURANTE 12 MESES. EL DESCUENTO SE EFECTÚA SOBRE EL PRECIO REGULAR DEL ABONO VIGENTE AL MOMENTO DE LA APLICACIÓN. PARA HACER USO DE LA LÍNEA, LA MISMA DEBERÁ ENCONTRARSE ACTIVA SIN NINGÚN TIPO DE RESTRICCIÓN. OFERTA HABILITADA SOLO PARA USO PERSONAL, ESTÁ TOTALMENTE PROHIBIDO SU REVENTA Y/O USO COMERCIAL. LA DETECCIÓN DE SU USO INDEBIDO HABILITA A TELECOM ARGENTINA S.A A LA SUSPENSIÓN DE LA LÍNEA. MÁS INFORMACIÓN DE LOS PLANES EN WWW.PERSONAL.COM.AR/TIENDA/PLANES/ O *111. PROMOCIÓN NO ACUMULABLE CON OTROS DESCUENTOS. PRECIOS CONSUMIDOR FINAL CON IVA INCLUIDO. TELECOM ARGENTINA S.A. ALICIA MOREAU DE JUSTO 50. C.A.B.A. CUIT 30-63945373-8.
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="height: 35px; width: 85px; border-radius: 6px; border: none; color: white; background-color: #0198cf;">Acepto</button>
        </div>
        
      </div>
    </div>
  </div>
  

        <!-- End About Section -->

        <!-- Footer Section -->
        <footer id="footer" class="footer gray-bg">
         <div class="container">
            <div class="row">
                    <div class="col-md-2 text-center">
                       <img src="<?= Url::to('@web/portabilidad/img/logo-grey.png') ?>" alt="">
                    </div>
                    <div class="col-md-8 text-center">
                        <p class="copyright" style="color: #555555;">
                        Telecom Argentina S.A. - Todos los derechos reservados - Alicia Moreau de Justo 50 - Ciudad de Bs. As. <br> CUIT 30-63945373-8 | <button id="legales" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Ver legales</button>
                        </p>
                    </div>
                    <div class="col-md-2 text-center">
                       <img src="<?= Url::to('@web/portabilidad/img/QR.jpg') ?>" alt="">
                    </div>                    
                </div>
            </div>
        </footer>
        <!-- End Footer Section -->

    </div>
    <!-- End Page Wraper -->



    <!-- JS Script -->
    <script src="<?= Url::to('@web/portabilidad/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.easing.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/SmoothScroll.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/owl.carousel.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/wow.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/isotope.pkgd.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.stellar.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.fitvids.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.magnific-popup.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.appear.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.countTo.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.mb.YTPlayer.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.simple-text-rotator.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.backstretch.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.singlePageNav.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/plugins/jquery.validate.min.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/send-subscribe.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/contact-form.js') ?>" type="text/javascript"></script>
    <script src="<?= Url::to('@web/portabilidad/js/theme.js') ?>" type="text/javascript"></script>

    <script>function show5gb() {
   document.getElementById('form5gb').style.display = "block";
}
</script>
    <script>function hide5gb() {
   document.getElementById('form5gb').style.display = "none";
}
</script>   
    <script>function show8gb() {
   document.getElementById('form8gb').style.display = "block";
}
</script>
<script>function hide8gb() {
   document.getElementById('form8gb').style.display = "none";
}
</script> 
    <script>function show12gb() {
   document.getElementById('form12gb').style.display = "block";
}
</script>
       <script>function hide12gb() {
   document.getElementById('form12gb').style.display = "none";
}
</script> 
    <script>function show20gb() {
   document.getElementById('form20gb').style.display = "block";
}
</script>
    <script>function hide20gb() {
   document.getElementById('form20gb').style.display = "none";
}
</script> 

</body>
</html>
