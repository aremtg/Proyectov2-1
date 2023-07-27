<?php 
    $inicio = ($pagina > 0) ? (($pagina * $registros)-$registros) : 0; // esta funcion es para saber donde iniciar la tabla
    $tabla = "";       
    $id_user = $_SESSION['usuario']['id_usuario'];                     //variable para generar todo el listado de usuarios

    if(isset($busqueda) && $busqueda != ""){

        $consulta_datos = "SELECT * FROM usuarios WHERE ((id_usuario != $id_user) AND (nombre_usuario LIKE '%$busqueda%' OR apellido_usuario LIKE '%$busqueda%' OR documento_usuario LIKE '%$busqueda%')) ORDER BY nombre_usuario ASC LIMIT $inicio,$registros ;";

        $consulta_total = "SELECT COUNT(id_usuario) FROM usuarios WHERE ((id_usuario != $id_user) AND (nombre_usuario LIKE '%$busqueda%' OR apellido_usuario LIKE '%$busqueda%' OR documento_usuario LIKE '%$busqueda%'));";
    }else{
        $consulta_datos = "SELECT * FROM usuarios WHERE id_usuario != $id_user ORDER BY nombre_usuario ASC LIMIT $inicio,$registros;";

        $consulta_total = "SELECT COUNT(id_usuario) FROM usuarios WHERE id_usuario != $id_user;";
    }

    $datos = mysqli_query($db, $consulta_datos);
    $datos = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    

    $total = mysqli_query($db, $consulta_total);
    $total = mysqli_fetch_array($total);
    $total = (int) $total[0];

    $Npaginas = ceil($total/$registros);

    $tabla.='
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th class="has-text-centered">#</th>
                    <th class="has-text-centered">Tipo de Documento</th>
                    <th class="has-text-centered"># Documento</th>
                    <th class="has-text-centered">Nombres</th>
                    <th class="has-text-centered">Apellidos</th>
                    <th class="has-text-centered">Correo</th>
                    <th class="has-text-centered">Usuario</th>
                    <th class="has-text-centered">Rol</th>
                </tr>
            </thead>
            <tbody>

        ';

    if($total>=1 && $pagina<=$Npaginas){
        $contador=$inicio+1; // esta varibale llevar la numeracion en la tabla 
        $pag_inicio=$inicio+1; // variable para saber en que pocision de la pagina inicial estamos mostrado en el texto "mostrando usuarios"

        foreach($datos as $rows){
            $tabla.='
                <tr class="has-text-centered" >
                <td>'.$contador.'</td>
                <td>'.$rows['tipoDoc_usuario'].'</td>
                <td>'.$rows['documento_usuario'].'</td>
                <td>'.$rows['nombre_usuario'].'</td>
                <td>'.$rows['apellido_usuario'].'</td>
                <td>'.$rows['correo_usuario'].'</td>
                <td>'.$rows['usuario_usuario'].'</td>
                <td>'.$rows['rol_usuario'].'</td>
                </tr>
            ';
            $contador++;
        
        }
        
        $pag_final=$contador-1; //variable para saber en que pocision de la pagina final estamos mostrado en el texto "mostrando usuarios"

    }else{

        if($total>=1){
            $tabla.='
            <tr class="has-text-centered" >
            <td colspan="7">
                <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </td>
            </tr>
            ';
    
        }else{
            $tabla.='
            <tr class="has-text-centered" >
            <td colspan="7"  class="no_hay_registros">
                No hay registros en el sistema!
            </td>
            </tr>
            ';
        }
    }
    $tabla.=' </tbody></table>';

    if($total>=1 && $pagina <= $Npaginas){
        $tabla.='
        <p class="has-text-right">Mostrando usuarios <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
        ';
    }

    mysqli_close($db);
    echo $tabla;

    if($total>=1 && $pagina <= $Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,2); //funcion ya definida en el archivo main.php
    }
    ?>