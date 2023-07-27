$(document).ready(function(){


    $("#form-login").validate({

        rules:{
            login_usuario:{
                required:true
            },
            login_clave:{
                required:true
            }
        },
        messages:{
            login_usuario:{
                required:"Este campo es obligatorio."
            },
            login_clave:{
                required:"Este campo es obligatorio."
            }
        }
    });

});

