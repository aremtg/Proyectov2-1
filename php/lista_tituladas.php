<?php 

    $inicio = ($pagina > 0) ? (($pagina * $registros)-$registros) : 0; // esta funcion es para saber donde iniciar la tabla
    $tabla = "";       


    if(isset($busqueda) && $busqueda != ""){

        $consulta_datos = "SELECT * FROM tituladas WHERE (nombre_titulada LIKE %$busqueda% OR ficha_titulada LIKE %$busqueda%) ORDER BY nombre_titulada ASC LIMIT $inicio,$registros ;";

        $consulta_total = "SELECT COUNT(id_titulada) FROM tituladas WHERE (nombre_titulada LIKE %$busqueda% OR ficha_titulada LIKE %$busqueda% OR %$busqueda% )); ";
    }else{
        $consulta_datos = "SELECT * FROM tituladas  ORDER BY nombre_titulada ASC LIMIT $inicio,$registros;";

        $consulta_total = "SELECT COUNT(id_titulada) FROM tituladas ;";
    }

    $datos = mysqli_query($db, $consulta_datos);
    $datos = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    

    $total = mysqli_query($db, $consulta_total);
    $total = mysqli_fetch_array($total);
    $total = (int)$total[0];


    $Npaginas = ceil($total/$registros);

    $tabla.='
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th class="has-text-centered">#</th>
                    <th class="has-text-centered">Nombre Titulada</th>
                    <th class="has-text-centered">Ficha</th>
                    <th class="has-text-centered">Jornada</th>
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
                <td>'.$rows['nombre_titulada'].'</td>
                <td>'.$rows['ficha_titulada'].'</td>
                <td>'.$rows['jornada'].'</td>
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
            <td colspan="7">
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
