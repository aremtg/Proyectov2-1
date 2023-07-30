<?php 

require_once('./php/conexion.php');

$usuario = limpiar_cadena($_POST['login_usuario']);
$clave = limpiar_cadena($_POST['login_clave']);

$sql = "SELECT * FROM usuarios WHERE usuario_usuario = '$usuario';";
$login = mysqli_query($db, $sql);

if($login && mysqli_num_rows($login)==1){

    $datos = mysqli_fetch_assoc($login);

    
    //confirmar contrasena
    $check_password = password_verify($clave , $datos["clave_usuario"]);


    if($check_password){
        
        $_SESSION['usuario'] = $datos;

        if(isset($_SESSION['usuarioNoExiste'])){
            session_unset();
        }
        header('location:./index.php?vista=home');
    }else{

        $_SESSION['errorPassword'] = "
    <div class='message-header'>
        <p>Error al iniciar sesion</p>
    </div>
    <div class='message-body'>
        La <strong>CONTRASEÑA</strong> no coincide con el usuario ingresado!
    </div>
    ";
    header('location:./index.php?vista=login');
    }
    

}else{
    
    $_SESSION['usuarioNoExiste'] = "
    <div class='message-header'>
        <p>Error al iniciar sesion</p>
    </div>
    <div class='message-body'>
        El <strong>USUARIO </strong> ingresado '$usuario' no existe!
    </div>
    ";
    header('location:./index.php?vista=login');
}

mysqli_close($db);


?>