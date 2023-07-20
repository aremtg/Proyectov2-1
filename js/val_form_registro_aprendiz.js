$(document).ready(function(){

    $('#form_aprendiz').validate({

        rules:{
            usuario:{
                required:true
            },
            nombre_aprendiz:{
                required:true
            },
            apellido_aprendiz:{
                required:true
            },
            tipodocumento:{
                required:true
            },
            documento_aprendiz:{
                required:true,
                Number:true
            },
            correo_aprendiz:{
                required:true,
                email:true
            },
            cel_aprendiz:{
                required:true,
                number:true,
            },
            titulada:{
                required:true
            }
        },
        messages:{
            nombre_aprendiz:{
                required:"El nombre debe ir definido"
            },
            apellido_aprendiz:{
                required:"El apellido debe ir definido"
            },
            tipodocumento:{
                required:"Define el tipo de Documento"
            },
            documento_aprendiz:{
                required:"El numero de documento debe ir definido",
                Number:"Solo acepta numeros"
            },
            correo_aprendiz:{
                required:"El correo debe ir definido",
                email:"Este correo no es valido"
            },
            cel_aprendiz:{
                required:"El celular debe ir definido",
                number:"Esto es un campo numerico"
            }
        } 
    });
});