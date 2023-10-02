<?php 
require_once('conexion.php');
require_once('main.php');

$nombreInstructor = limpiar_cadena($_POST['nombre_instructor']);
$nombreAprendiz = limpiar_cadena($_POST['nombre_aprendiz']);
$ficha = limpiar_cadena($_POST['ficha']);
$titulada = limpiar_cadena($_POST['titulada']);
$ambiente = limpiar_cadena($_POST['ambiente']);
$errores = [];

if (empty($nombreInstructor)) {
    $errores['nombre_instructor'] = "El nombre del instructor es obligatorio.";
}
$consultaVerificar = "SELECT nombre_instructor FROM datos_permisos WHERE nombre_instructor = '$nombreInstructor'";
$resultadoVerificar = mysqli_query($db, $consultaVerificar);

if (mysqli_num_rows($resultadoVerificar) > 0) {
    // El nombre del instructor ya existe en la tabla
    $errores['nombre_instructor'] = "El instructor ya está registrado.";
}

if (empty($errores)) {
    // Construir la consulta SQL de inserción
    $consulta = "INSERT INTO datos_permisos (id, nombre_instructor, nombre_aprendiz, ficha, titulada, ambiente) VALUES (null, '$nombreInstructor', '$nombreAprendiz', '$ficha', '$titulada', '$ambiente')";

    if($mysqli_query($db, $consulta)){
        $_SESSION['datos_permisos'] = "
            <div class='message-header title is-5 m-0'>
                <p>Registro exitoso!</p>
            </div>
            <div class='message-body is-size-6'>
                El usuario <strong>$nombreInstructor </strong>  ha sido registrado correctamente.
            </div>";

    }else{
        $_SESSION['error-datos_permisos'] = "
        <div class='message is-danger title is-5 m-0'>
            <div class='message-header'>
                <p>Error de Registro!</p>
            </div>
            <div class='message-body is-size-6'>
                El <strong>Usuario </strong> no se ha podido registrar comuniquese con soporte.
            </div>
            </div>";
    }

}

mysqli_close($db);
header('location:../index.php?vista=datos_permisos');


?>

