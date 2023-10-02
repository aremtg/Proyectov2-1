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

    // Ejecutar la consulta SQL
    if (mysqli_query($db, $consulta)) {
        echo "Los datos de permisos se han guardado correctamente.";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($db);
    }
}

mysqli_close($db);
header('location:../index.php?vista=datos_permisos');


?>

