$(document).ready(function(){

    
    $("#perfil_up_form").validate({
        
        rules:{
            tipodocumento:{
                required:true,
            },
            documento:{
                required:true,
                number:true
            },
            nombres:{
                required: true
            },
            apellidos:{
                required: true
            },
            email:{
                required: true,
                email: true
            },
            usuario:{
                required: true,
                minlength:6
            },
            clave_user:{
                required: true,
                minlength:6
            },
            clave_new:{
                required: true,
                minlength:6
            },
            tiporol:{
                required:true
            }
        },
    
        messages:{
            tipodocumento:{
                required: "Define el tipo de Documento"
            },
            documento:{
                required: "Este campo es requerdio",
                number: "Solo acepta numeros" 
            },
            nombres:{
                required: "Por favor ingresa el nombre",
            },
            apellidos:{
                required: "Ingresa tus apellidos",
            },
            email:{
                required: "El correo es obligatorio",
                email: "Ingresa un correo valido"
            },
            usuario:{
                required:"El usuario debe ir definido",
                minlength:"El usuario debe tener un minimo de 6 caracteres"
            },
            clave_user:{
                required:"La contraseña esta vacia",
                minlength:"La contraseña debe tener un minimo de 6 caracteres"
            },
            clave_new:{
                required:"La contraseña esta vacia",
                minlength:"La contraseña debe tener un minimo de 6 caracteres"
            },
            tiporol:{
                required: "Debes elegir una opcion"
            }
        }
    });
    



//funcion para validar el checkbox del cambio de contraseña queremos que se active y desactive un input
$("#check_up_pass").change(function(){

    if($(this).is(":checked")){
        document.getElementById("clave_cambiada").disabled = false;
        document.getElementById("clave_cambiada").required = true;
        document.getElementById("clave_cambiada").focus();
    }else{
        document.getElementById("clave_cambiada").disabled = true;
        document.getElementById("clave_cambiada").required = false;
        document.getElementById("clave_cambiada").value = "";
    }
});




//funcion para validar el checkbox de el boton eliminar del perfil
$('#check_confirm').change(function(){

    if($(this).is(':checked')){
        document.getElementById('confirm_pass').required = true;
        document.getElementById('confirm_pass').disabled = false;
        document.getElementById('confirm_pass').focus();
    }else{
        document.getElementById('confirm_pass').required = false;
        document.getElementById('confirm_pass').disabled = true;
        document.getElementById('confirm_pass').value = "";
    }
});

});