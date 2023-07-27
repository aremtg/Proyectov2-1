<?php 

    $inicio = ($pagina > 0) ? (($pagina * $registros)-$registros) : 0; // esta funcion es para saber donde iniciar la tabla
    $tabla = "";       


    if(isset($busqueda) && $busqueda != ""){

        $consulta_datos = "SELECT CONCAT(u.nombre_usuario,' ',u.apellido_usuario)AS 'nombre usuario',
        CONCAT(a.nombre_aprendiz,' ',a.apellido_aprendiz)AS'Nombre Aprendiz',
        a.id_aprendiz,
        a.documento,
        a.email_aprendiz,
        a.celular,
        ti.nombre_titulada,
        ti.ficha_titulada
        FROM aprendices a 
        INNER JOIN usuarios u ON u.id_usuario = a.id_usuario
        INNER JOIN tituladas ti ON ti.id_titulada = a.id_titulada
        WHERE (a.nombre_aprendiz LIKE '%$busqueda%' OR a.apellido_aprendiz LIKE '%$busqueda%' OR a.documento LIKE '%$busqueda%') ORDER BY a.nombre_aprendiz ASC LIMIT $inicio,$registros ";

        $consulta_total = "SELECT COUNT(id_aprendiz) FROM aprendices WHERE (nombre_aprendiz LIKE '%$busqueda%' OR apellido_aprendiz LIKE '%$busqueda%' OR documento LIKE '%$busqueda%'); ";
    }else{
        $consulta_datos = "SELECT CONCAT(u.nombre_usuario,' ',u.apellido_usuario)AS 'nombre usuario',
        CONCAT(a.nombre_aprendiz,' ',a.apellido_aprendiz)AS'Nombre Aprendiz',
        a.id_aprendiz,
        a.documento,
        a.email_aprendiz,
        a.celular,
        ti.nombre_titulada,
        ti.ficha_titulada
        FROM aprendices a 
        INNER JOIN usuarios u ON u.id_usuario = a.id_usuario
        INNER JOIN tituladas ti ON ti.id_titulada = a.id_titulada  
        ORDER BY nombre_aprendiz ASC LIMIT $inicio,$registros;";

        $consulta_total = "SELECT COUNT(id_aprendiz) FROM aprendices ;";
    }

    $datos = mysqli_query($db, $consulta_datos);
    $datos = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    

    $total = mysqli_query($db, $consulta_total);
    $total = mysqli_fetch_array($total);
    $total = (int)$total[0];


    $Npaginas = ceil($total/$registros);

    $tabla.='
    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Usuario</th>
                    <th>Nombre aprendiz</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th># Contacto</th>
                    <th>Titulada</th>
                    <th>Ficha titulada</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        ';

    if($total>=1 && $pagina<=$Npaginas){
        $contador=$inicio+1; // esta varibale llevar la numeracion en la tabla 
        $pag_inicio=$inicio+1; // variable para saber en que pocision de la pagina inicial estamos mostrado en el texto "mostrando usuarios"

        foreach($datos as $rows){
            $tabla.='
                <tr>
                <td>'.$contador.'</td>
                <td>'.$rows['nombre usuario'].'</td>
                <td>'.$rows['Nombre Aprendiz'].'</td>
                <td>'.$rows['documento'].'</td>
                <td>'.$rows['email_aprendiz'].'</td>
                <td>'.$rows['celular'].'</td>
                <td>'.$rows['nombre_titulada'].'</td>
                <td>'.$rows['ficha_titulada'].'</td>
                <td>
                    <a href="index.php?vista=aprendiz_articulos&aprendiz_id='.$rows['id_aprendiz'].'" class="button is-link is-rounded is-small">Ver todo</a>
                </td>
                </tr>
            ';
            $contador++;
        
        }
        
        $pag_final=$contador-1; //variable para saber en que pocision de la pagina final estamos mostrado en el texto "mostrando usuarios"

    }else{

        if($total>=1){
            $tabla.='
            <tr >
            <td colspan="9">
                <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </td>
            </tr>
            ';
    
        }else{
            $tabla.='
            <tr >
            <td colspan="9" class="no_hay_registros">
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