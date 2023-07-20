$(document).ready(function(){

    // //esta funcion es para validar la contraseña debe llevar punto y mayus
    // jQuery.validator.addMethod("mayus", function(value, element) {
    //     // allow any non-whitespace characters as the host part
    //     return this.optional( element ) || /^[A-Z].*[.]$/.test( value );
    // }, 'La primera letra es mayuscula y debe contener un punto al final');


$("#registro-for").validate({

    rules:{
        tipodocumento:{
            required:true,
        },
        documento:{
            required:true,
            number:true
        },
        nombres:{
            required: true,
        },
        apellidos:{
            required: true,
        },
        email:{
            required: true,
            email: true
        },
        usuario:{
            required: true,
            minlength:6
        },
        clave_1:{
            required:true,
            minlength:6
        },
        clave_2:{
            required:true,
            minlength:6
        },
        tiporol:{
            required:true
        }
    },

    messages:{
        tipodocumento:{
            required: "Debes elegir una opcion"
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
        clave_1:{
            required:"La contraseña esta vacia",
            minlength:"La contraseña debe tener un minimo de 6 caracteres"
        },clave_2:{
            required:"La contraseña esta vacia",
            minlength:"La contraseña debe tener un minimo de 6 caracteres"
        },
        tiporol:{
            required: "Debes elegir una opcion"
        }
    }

});

});



// esta parte es para actualizar y reflejar los datos de la tabla de perfil

// $('#guardar').click(function(){
    

//     var recolectar = $('#cambiar').serialize();

//     $.ajax({
//         url: '../php/actualizar.php',
//         type: 'POST',
//         data: recolectar,

//         success:function(vs){
//             if(vs == 1){
//                 alertify.success("Datos actualizados");
//                 $('#tabla_user').load('../Nav/cliente.php #tabla_user');
//                 $ ('#mod_per').modal('hide');
            
//             }else if(vs == 2){
//                 alertify.success("Contraseña y datos actualizados");
//                 $('#tabla_user').load('../Nav/cliente.php #tabla_user');
//                 $ ('#mod_per').modal('hide');
//             }else{
//                 alertify.error("la contraseña no es correcta");
//             }
            
            
            
//         }
//     })


// });