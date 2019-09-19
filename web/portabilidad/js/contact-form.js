(function ($) {

    "use strict";

    $("#contact").validate({
        errorPlacement: function () {
            return false;  // suppresses error message text
        }
    });

    
    /* =================================
    ===  CONTACT FORM               ====
    =================================== */
    $("#contact").submit(function (e) {
        e.preventDefault();
        var name = $("#form-name").val();
        var email = $("#form-email").val();
        var phone = $("#form-phone").val();
        var plan = $("#form-plan").val();
        var ktoken = $("#form-ktoken").val();
        var gen = $("#form-gen").val();
        var dataString = 'name=' + name + '&email=' + email + '&phone=' + phone + '&plan=' + plan + '&ktoken=' + ktoken;

        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (validEmail(email) && (name.length > 1) && (phone.length > 1)) {
            $.ajax({
                type: "POST",
                url: "promo",
                data: dataString,
                success: function (data) {
                    // alert("success");
                    if (gen=='gen1'){
                        $('.successContent5GB').fadeIn(1000);
                        $('.errorContent5GB').fadeOut(500);
                    }
                    if (gen=='gen2'){
                        $('.successContent8GB').fadeIn(1000);
                        $('.errorContent8GB').fadeOut(500);
                    }
                    if (gen=='gen3'){
                        $('.successContent12GB').fadeIn(1000);
                        $('.errorContent12GB').fadeOut(500);
                    }
                    if (gen=='gen4'){
                        $('.successContent20GB').fadeIn(1000);
                        $('.errorContent20GB').fadeOut(500);
                    }
                    // $('.successContent').fadeIn(1000);
                    // $('.errorContent').fadeOut(500);
                },
                error: function (exception) {
                    if (gen=='gen1'){
                        $('.errorContent5GB').fadeIn(1000);
                        $('.successContent5GB').fadeOut(500);                        
                    }
                    if (gen=='gen2'){
                        $('.errorContent8GB').fadeIn(1000);
                        $('.successContent8GB').fadeOut(500);                        
                    }
                    if (gen=='gen3'){
                        $('.errorContent12GB').fadeIn(1000);
                        $('.successContent12GB').fadeOut(500);                        
                    }
                    if (gen=='gen4'){
                        $('.errorContent20GB').fadeIn(1000);
                        $('.successContent20GB').fadeOut(500);                        
                    }
                    // $('.errorContent').fadeIn(1000);
                    // $('.successContent').fadeOut(500);
                }
            });
        }
        else {
            $('.errorContent').fadeIn(1000);
            $('.successContent').fadeOut(500);
        }
        return false;
    });

  
})(jQuery);


