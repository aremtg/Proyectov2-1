<?php 
require_once('conexion.php');
require_once('main.php');

$nombreInstructor = limpiar_cadena($_POST['nombre_instructor']);
$nombreAprendiz = limpiar_cadena($_POST['nombre_aprendiz']);
$ficha = limpiar_cadena($_POST['ficha']);
$titulada = limpiar_cadena($_POST['titulada']);
$ambiente = limpiar_cadena($_POST['ambiente']);
$errores = [];



mysqli_close($db);
header('location:../index.php?vista=datos_permisos');


?>

