(function ($) {

    "use strict";

    $("#contact").validate({
        errorPlacement: function () {
            return false;  // suppresses error message text
        }
    });
    $("#contact8gb").validate({
        errorPlacement: function () {
            return false;  // suppresses error message text
        }
    });
    $("#contact12gb").validate({
        errorPlacement: function () {
            return false;  // suppresses error message text
        }
    });
    $("#contact20gb").validate({
        errorPlacement: function () {
            return false;  // suppresses error message text
        }
    });

    
    /* =================================
    ===  CONTACT FORM               ====
    =================================== */
    $("#contact").submit(function (e) {
        e.preventDefault();
        var name    = $("#form-name").val();
        var email   = $("#form-email").val();
        var phone   = $("#form-phone").val();
        var plan    = $("#form-plan").val();
        var ktoken  = $("#form-ktoken").val();
        var gen     = $("#form-gen").val();
        var captcha = $("#g-recaptcha-response").val();
        var dataString = 'name='+name+'&email='+email+'&phone='+phone+'&plan='+plan+'&ktoken='+ktoken+'&gen='+gen+'&captcha='+captcha;

        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (validEmail(email) && (name.length > 1) && (phone.length > 1)) {
            $.ajax({
                type: "POST",
                url: "/teco/web/formulario/promo",
                data: dataString,
                success: function (data) {
                    alert(data);
                    if(data==200){
                        switch(gen) {
                            case 'gen1':
                                $('.successContent5GB').fadeIn(1000);
                                $('.errorContent5GB').fadeOut(500);
                                borrarCampos();
                            break;
                            case 'gen2':
                                $('.successContent8GB').fadeIn(1000);
                                $('.errorContent8GB').fadeOut(500);
                                borrarCampos();
                            break;
                            case 'gen3':
                                $('.successContent12GB').fadeIn(1000);
                                $('.errorContent12GB').fadeOut(500);
                                borrarCampos();
                            break;
                            case 'gen4':
                                $('.successContent20GB').fadeIn(1000);
                                $('.errorContent20GB').fadeOut(500);
                                borrarCampos();
                            break;
                        }
                    }else{
                        switch(gen) {
                            case 'gen1':
                                $('.errorContent5GB').fadeIn(1000);
                                $('.successContent5GB').fadeOut(500);  
                            break;
                            case 'gen2':
                                $('.errorContent8GB').fadeIn(1000);
                                $('.successContent8GB').fadeOut(500);   
                            break;
                            case 'gen3':
                                $('.errorContent12GB').fadeIn(1000);
                                $('.successContent12GB').fadeOut(500); 
                            break;
                            case 'gen4':
                                $('.errorContent20GB').fadeIn(1000);
                                $('.successContent20GB').fadeOut(500);  
                            break;
                        }       
                    }
                },
                error: function (exception) {
                    switch(gen) {
                        case 'gen1':
                            $('.errorContent5GB').fadeIn(1000);
                            $('.successContent5GB').fadeOut(500);  
                        break;
                        case 'gen2':
                            $('.errorContent8GB').fadeIn(1000);
                            $('.successContent8GB').fadeOut(500);   
                        break;
                        case 'gen3':
                            $('.errorContent12GB').fadeIn(1000);
                            $('.successContent12GB').fadeOut(500); 
                        break;
                        case 'gen4':
                            $('.errorContent20GB').fadeIn(1000);
                            $('.successContent20GB').fadeOut(500);  
                        break;
                    } 
                }
            });
        }
        else {
            switch(gen) {
                case 'gen1':
                    $('.errorContent5GB').fadeIn(1000);
                    $('.successContent5GB').fadeOut(500);  
                break;
                case 'gen2':
                    $('.errorContent8GB').fadeIn(1000);
                    $('.successContent8GB').fadeOut(500);   
                break;
                case 'gen3':
                    $('.errorContent12GB').fadeIn(1000);
                    $('.successContent12GB').fadeOut(500); 
                break;
                case 'gen4':
                    $('.errorContent20GB').fadeIn(1000);
                    $('.successContent20GB').fadeOut(500);  
                break;
            } 
        }
        return false;
    });

    $("#contact8gb").submit(function (e) {
        e.preventDefault();
        var name       = $("#form-name8gb").val();
        var email      = $("#form-email8gb").val();
        var phone      = $("#form-phone8gb").val();
        var plan       = $("#form-plan8gb").val();
        var ktoken     = $("#form-ktoken8gb").val();
        var gen        = $("#form-gen8gb").val();
        var captcha = $("#g-recaptcha-response").val();
        var dataString = 'name='+name+'&email='+email+'&phone='+phone+'&plan='+plan+'&ktoken='+ktoken+'&gen='+gen+'&captcha='+captcha;

        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (validEmail(email) && (name.length > 1) && (phone.length > 1)) {
            $.ajax({
                type: "POST",
                url: "/teco/web/formulario/promo",
                data: dataString,
                success: function (data) {
                    alert(data);
                    if(data==200){
                        $('.successContent8GB').fadeIn(1000);
                        $('.errorContent8GB').fadeOut(500);
                        borrarCampos();
                    }else{
                        $('.errorContent8GB').fadeIn(1000);
                        $('.successContent8GB').fadeOut(500);
                    }
                },
                error: function (exception,data) {
                    $('.errorContent8GB').fadeIn(1000);
                    $('.successContent8GB').fadeOut(500);     
                }
            });
        }
        else {
            $('.errorContent8GB').fadeIn(1000);
            $('.successContent8GB').fadeOut(500); 
        }
        return false;
    });

    $("#contact12gb").submit(function (e) {
        e.preventDefault();
        var name       = $("#form-name12gb").val();
        var email      = $("#form-email12gb").val();
        var phone      = $("#form-phone12gb").val();
        var plan       = $("#form-plan12gb").val();
        var ktoken     = $("#form-ktoken12gb").val();
        var gen        = $("#form-gen12gb").val();
        var captcha = $("#g-recaptcha-response").val();
        var dataString = 'name='+name+'&email='+email+'&phone='+phone+'&plan='+plan+'&ktoken='+ktoken+'&gen='+gen+'&captcha='+captcha;

        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (validEmail(email) && (name.length > 1) && (phone.length > 1)) {
            $.ajax({
                type: "POST",
                url: "/teco/web/formulario/promo",
                data: dataString,
                success: function (data) {
                    alert(data);
                    if(data==200){
                        $('.successContent12GB').fadeIn(1000);
                        $('.errorContent12GB').fadeOut(500);
                        borrarCampos();
                    }else{
                        $('.errorContent12GB').fadeIn(1000);
                        $('.successContent12GB').fadeOut(500);   
                    }
                },
                error: function (exception) {
                    $('.errorContent12GB').fadeIn(1000);
                    $('.successContent12GB').fadeOut(500);   
                }
            });
        }
        else {
            $('.errorContent12GB').fadeIn(1000);
            $('.successContent12GB').fadeOut(500);
        }
        return false;
    });

    $("#contact20gb").submit(function (e) {
        e.preventDefault();
        var name       = $("#form-name20gb").val();
        var email      = $("#form-email20gb").val();
        var phone      = $("#form-phone20gb").val();
        var plan       = $("#form-plan20gb").val();
        var ktoken     = $("#form-ktoken20gb").val();
        var gen        = $("#form-gen20gb").val();
        var captcha = $("#g-recaptcha-response").val();
        var dataString = 'name='+name+'&email='+email+'&phone='+phone+'&plan='+plan+'&ktoken='+ktoken+'&gen='+gen+'&captcha='+captcha;

        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (validEmail(email) && (name.length > 1) && (phone.length > 1)) {
            $.ajax({
                type: "POST",
                url: "/teco/web/formulario/promo",
                data: dataString,
                success: function (data) {
                    alert(data);
                    if(data==200){
                        $('.successContent20GB').fadeIn(1000);
                        $('.errorContent20GB').fadeOut(500);
                        borrarCampos();
                    }else{
                        $('.errorContent20GB').fadeIn(1000);
                        $('.successContent20GB').fadeOut(500);
                    }
                },
                error: function (exception) {
                    $('.errorContent20GB').fadeIn(1000);
                    $('.successContent20GB').fadeOut(500);
                }
            });
        }
        else {
            $('.errorContent20GB').fadeIn(1000);
            $('.successContent20GB').fadeOut(500);
        }
        return false;
    });
    
function borrarCampos(){
    $("#form-name").val("");
    $("#form-email").val("");
    $("#form-phone").val("");
    $("#form-name8gb").val("");
    $("#form-email8gb").val("");
    $("#form-phone8gb").val("");
    $("#form-name12gb").val("");
    $("#form-email12gb").val("");
    $("#form-phone12gb").val("");
    $("#form-name20gb").val("");
    $("#form-email20gb").val("");
    $("#form-phone20gb").val("");
}    
  
})(jQuery);


