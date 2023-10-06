<?php
require_once('../php/conexion.php');

$result = $db->query("SELECT imagenes FROM imagenes_tabla");

if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        $imagen = $fila['imagenes'];
       
        echo '<img width="auto" class="" src="'.($imagen) . '" /><br>';
   
    }
} else {
    echo 'No existen imágenes en la base de datos.';
}
$db->close();
?>
