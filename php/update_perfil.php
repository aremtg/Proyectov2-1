<?php 

require_once('./conexion.php');
require_once('./main.php');

$tipoDoc = $_POST['tipodocumento'];
$documento = limpiar_cadena($_POST['documento']);
$nombres = limpiar_cadena($_POST['nombres']);
$apellidos = limpiar_cadena($_POST['apellidos']);
$correo = limpiar_cadena($_POST['email']);
$clave = limpiar_cadena($_POST['clave_user']);
$rol = $_POST['tiporol'];

$errores = array();
$user = $_SESSION['usuario']['usuario_usuario'];

if(isset($_POST['clave_new'])){
    $clave_new = limpiar_cadena($_POST['clave_new']);
    if(!empty($clave_new)){
        $pass = password_hash($clave_new,PASSWORD_BCRYPT,["cost"=>10]);
    }else{
        $errores['pass'] = "La contraseña nueva no puede quedar vacia!";
    }
    
}




if(empty($documento) && is_numeric($documento)){

    $sql_doc = "SELECT * FROM usuarios WHERE documento_usuario=$documento AND usuario_usuario != '$user';";
    $check_documento = mysqli_query($db, $sql_doc);

    if($check_documento && mysqli_num_rows($check_documento)==1){

        $errores['documento'] = "Este documento ya esta registrado";
    }
}



if(empty($nombres) || verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombres)){
    $errores['nombres']= "El nombre no cumple con los parametros establecidos";
}else{
    $nombres = ucwords(strtolower($nombres));
}

if(empty($apellidos) || verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellidos)){
    $errores['apellidos']= "El apellido no cumple con los parametros establecidos";
}else{
    $apellidos = ucwords(strtolower($apellidos));
}


if(verificar_datos("[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$usuario)){
    $errores['usuario']= "El usuario no cumple con los parametros establecidos";
}

if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    
    $sql_email = "SELECT * FROM usuarios WHERE correo_usuario = '$correo' AND usuario_usuario != '$user';";
    $check_email = mysqli_query($db, $sql_email);

    if($check_email && mysqli_num_rows($check_email)==1){
        $errores['correo']= "El correo ya se encuentra registrado";
    }
    
}else{
    $errores['correo']= "El correo no es valido";
}



if(count($errores) == 0){

    $clave_user = $_SESSION['usuario']['clave_usuario'];
    $id = $_SESSION['usuario']['id_usuario'];

    
    $clave_iguales = password_verify($clave, $clave_user);

    if($clave_iguales){

        if(isset($clave_new)){
            $sql = "UPDATE Usuarios SET 
                tipoDoc_usuario = '$tipoDoc',
                documento_usuario = '$documento', 
                nombre_usuario ='$nombres', 
                apellido_usuario ='$apellidos', 
                correo_usuario = '$correo',
                clave_usuario = '$pass',
                rol_usuario = '$rol'
                WHERE usuario_usuario = '$user'
                ";

        $guardar_usuario_pass = mysqli_query($db, $sql);

            if($guardar_usuario_pass){
                $_SESSION['guardar'] = "
                <div class='message-header title is-5 m-0'>
                    <p>Actualizacion Exitosa!</p>
                </div>
                <div class='message-body is-size-6'>
                    Tus datos se han actualizado <strong>CORRECTAMENTE</strong>.
                </div>";
            }

        }else{

            $sql = "UPDATE Usuarios SET 
                tipoDoc_usuario = '$tipoDoc',
                documento_usuario = '$documento', 
                nombre_usuario ='$nombres', 
                apellido_usuario ='$apellidos', 
                correo_usuario = '$correo',
                rol_usuario = '$rol'
                WHERE usuario_usuario = '$user'
                ;";

        $guardar_usuario = mysqli_query($db, $sql);
        
            if($guardar_usuario){
                $_SESSION['guardar'] = "
                <div class='message-header title is-5 m-0'>
                    <p>Actualizacion Exitosa!</p>
                </div>
                <div class='message-body is-size-6'>
                    Tus datos se han actualizado <strong>CORRECTAMENTE</strong>.
                </div>";
            }
        }

        
    }else{

        $_SESSION['error-clave'] = "
            <div class='message-header title is-5 m-0'>
                <p>Error al actualizar!</p>
            </div>
            <div class='message-body is-size-6'>
                La <strong>CONTRASEÑA</strong> es incorrecta.
            </div>";
    }

    
}
$_SESSION['errores']= $errores;
mysqli_close($db);
header('location:../index.php?vista=perfil');
?>