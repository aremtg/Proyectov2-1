<?php
require_once('conexion.php');
require_once('helper.php');

$where = "";

if(isset($_POST['busqueda'])){
    $busqueda = $_POST['busqueda'];
}
    $where = " WHERE nombre_titulada LIKE '%".$busqueda."%' OR ficha_titulada LIKE '".$busqueda."' ORDER BY nombre_titulada ASC";


$contador = 1; 

$resultado = obtenerDatos($db,'tituladas',$where); 
if(mysqli_num_rows($resultado)>0){
    echo'
    <table class="table is-bordered">
                <thead>
                    <tr class="has-text-centered">
                        <th></th>
                        <th>#</th>
                        <th>Nombre Titulada</th>
                        <th>Ficha titulada</th>
                        <th>jornada</th>
                    </tr>
                </thead>
                <tbody>';



    while($datos = mysqli_fetch_array($resultado)){

        echo '
        <tr id="datos">
            <th><input type="checkbox" class="checkbox" name="id_titulada" value="'.$datos['id_titulada'].'" id="checkseleccionado"></th>
            <td>'.$contador.'</td>
            <td>'.$datos['nombre_titulada'].'</td>
            <td>'.$datos['ficha_titulada'].'</td>
            <td>'.$datos['jornada'].'</td>
        </tr>
        ';

    $contador++;
    } 
    echo "
    </tbody>
    </table>";
        }else{
            echo "
            <div class='message is-danger mt-3'>
                <div class='message-body'>
                    no se encontraron resultados!
                </div>
            </div>";
        }    

mysqli_close($db);

?>




