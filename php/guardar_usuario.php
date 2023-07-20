<?php 

require_once('./conexion.php');
require_once('./main.php');

$tipoDoc = $_POST['tipodocumento'];
$documento = limpiar_cadena($_POST['documento']);
$nombres = limpiar_cadena($_POST['nombres']);
$apellidos = limpiar_cadena($_POST['apellidos']);
$correo = limpiar_cadena($_POST['email']);
$usuario = limpiar_cadena($_POST['usuario']);
$clave_1 = limpiar_cadena($_POST['clave_1']);
$clave_2 = limpiar_cadena($_POST['clave_2']);
$rol = $_POST['tiporol'];

$errores = array();

if(is_numeric($documento)){
    
    $sql_doc = "SELECT * FROM usuarios WHERE documento_usuario = '$documento';";
    $check_documento = mysqli_query($db, $sql_doc);

    if($check_documento && mysqli_num_rows($check_documento)==1){

        $errores['documento'] = "Este documento ya esta registrado";
    }

}

if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombres)){
    $errores['nombres']= "El nombre no cumple con los parametros establecidos";
}else{
    $nombres = ucwords(strtolower($nombres));
}

if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellidos)){
    $errores['apellidos']= "El apellido no cumple con los parametros establecidos";
}else{
    $apellidos = ucwords(strtolower($apellidos));
}


if(verificar_datos("[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$usuario)){
    $errores['usuario']= "El usuario no cumple con los parametros establecidos";
}


if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    
    $sql_email = "SELECT * FROM usuarios WHERE correo_usuario = '$correo'; ";
    $check_email = mysqli_query($db, $sql_email);

    if($check_email && mysqli_num_rows($check_email)==1){
        $errores['correo']= "El correo ya se encuentra registrado";
    }
    
}else{
    $errores['correo']= "El correo no es valido";
}


if($clave_1 != $clave_2){
    $errores['contraseña']= "Las contraseñas no coinciden";
}else{
    $clave_check= password_hash($clave_1 ,PASSWORD_BCRYPT,['cost'=>10]);
}




//GUARDAR DATOS
if(count($errores)==0){

    $sql = "INSERT INTO usuarios VALUES(NULL,'$tipoDoc','$documento','$nombres','$apellidos','$correo','$usuario','$clave_check','$rol');";
    $guardar = mysqli_query($db, $sql);

        
            if($guardar){
                $_SESSION['registrado'] = "
                    <div class='message-header title is-5 m-0'>
                        <p>Registro exitoso!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El usuario <strong>$usuario </strong>  ha sido registrado correctamente.
                    </div>";

            }else{
                $_SESSION['errorRegistro'] = "
                <div class='message is-danger title is-5 m-0'>
                    <div class='message-header'>
                        <p>Error de Registro!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El <strong>Usuario </strong> no se ha podido registrar comuniquese con soporte.
                    </div>
                    </div>";
            }

}else{
    $_SESSION['errores'] = $errores;
}

mysqli_close($db);
header('location:../index.php?vista=usuario_nuevo');

?>