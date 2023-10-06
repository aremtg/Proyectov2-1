<?php 
require_once('conexion.php');
require_once('main.php');

if(isset($_POST['imagen_generada'])) {
    $imgContenido = $_POST['imagen_generada'];
    
    //Insertar imagen en la base de datos
    $insertar = $db->query("INSERT into imagenes_tabla (imagenes, creado) VALUES ('$imgContenido', now())");
    // COndicional para verificar la subida del fichero
    if($insertar){
        echo "Archivo Subido Correctamente.";
    }else{
        echo "Ha fallado la subida, reintente nuevamente.";
    } 
   
}else{
    echo "Por favor seleccione imagen a subir.";
}


mysqli_close($db);
header('location:../index.php?vista=papel_permisos');
?>