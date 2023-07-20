<?php 

require_once('./conexion.php');



if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM registro WHERE id_registro = $id;";
    $execute = mysqli_query($db, $sql);

    if($execute){
        $_SESSION['delete'] = 
        "<div class='message-header'>
            <p>Eliminado exitosamente</p>
        </div>
        <div class='message-body'>
            El <strong>Registro </strong> fue borrado!
        </div>
        "; 
    }


}else{
    header('location:../index.php?vista=registro_lista');
}
header('location:../index.php?vista=registro_lista');
?>