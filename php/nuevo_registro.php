<?php 
require_once('conexion.php');

mysqli_close($db);

header('location:../views/aplicacion.php')
?>