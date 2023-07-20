<?php 
require_once('conexion.php');
require_once('main.php');

$nombre_1 = limpiar_cadena($_POST['articulo']);
$nombre_2 = limpiar_cadena($_POST['articulo2']);

$errores = array();

if(empty($nombre_1)){
    $errores['articulo'] = "Este campo es obligatorio, Debe ir 1 articulo definido";
}else{
    $nombre_1 = ucwords(strtolower($nombre_1));
}

if(empty($nombre_2)){
    $nombre_2 = null;
}else{
    $nombre_2 = ucwords(strtolower($nombre_2));
}

if(count($errores)==0){

    $sql = "INSERT INTO articulos VALUES (null,'$nombre_1','$nombre_2');";
    $guardar = mysqli_query($db, $sql);

    if($guardar){

        $_SESSION['registrado'] = "
                    <div class='message-header title is-5 m-0'>
                        <p>Registro exitoso!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El Articulo <strong>$nombre_1</strong>  ha sido registrado correctamente.
                    </div>";
    }else{
        $_SESSION['errorRegistro'] = "
                <div class='message is-danger title is-5 m-0'>
                    <div class='message-header'>
                        <p>Error de Registro!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El Articulo no se ha podido registrar comuniquese con soporte.
                    </div>
                    </div>";
    }
}else{
    $_SESSION['errores']= $errores;
}

mysqli_close($db);
header('location:../index.php?vista=articulo_nuevo');
?>