<?php

$modulo_buscador=limpiar_cadena($_POST['modulo_buscador']);//variable que almacena el valor que se envio desde el formulario del archivo user_search

$modulos=["usuario","aprendiz","tituladas"];

if(in_array($modulo_buscador,$modulos)){ //in_array lo que hace es confirmar si un valor esta en un array 

    $modulos_url=[  // aqui va a tener las vistas donde va a redireccionar al usuario cuando eliminemos o asignamenos la busqueda
        "usuario"=>"usuario_search",
        "aprendiz"=>"aprendiz_search",
        "tituladas"=>"titulada_search"
    ];

    $modulos_url=$modulos_url[$modulo_buscador];//aqui define uno de los indice que estamos buscando en el array en este caso selecciona el indice usuarios =>user_search /nombre de la vista donde se va a recargar

    $modulo_buscador="busqueda_".$modulo_buscador;// aqui definimos el nombre de variable de sesion que se va a usar / nombre de variable de sesion que se va a usar

    #iniciar busqueda#
    if(isset($_POST['txt_buscador'])){ //valor recibido de el formulario del archivo user_search
        $txt=limpiar_cadena($_POST['txt_buscador']);

        if($txt==""){
            $_SESSION['error-buscador'] = '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error!</strong><br>
                introduce un texto de busqueda!
            </div>
            ';
        }else{

            if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}",$txt)){
                $_SESSION['error-buscadors']='
                <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error!</strong><br>
                El termino de busqueda no coincide con el formato solicitado!
                </div>
            ';
            }else{
                $_SESSION[$modulo_buscador]=$txt;
                header("Location:index.php?vista=$modulos_url",true,303); //redireccionamos al usuario pero sin enviar el formulario
            }

        }
    }


    #eliminar busqueda#
    if(isset($_POST['eliminar_buscador'])){
        unset($_SESSION[$modulo_buscador]); // aqui estamos elimindo el valor de busqueda
        header("Location:index.php?vista=$modulos_url",true,303); //redireccionamos al usuario pero sin enviar el formulario
    }

}else{
    $_SESSION['error-buscadora']='
    <div class="notification is-danger is-light">
        <strong>¡Ocurrio un error!</strong><br>
        No podemos procesar la peticion!
    </div>
    ';
}


?>