<?php 

function actualizarDatos($sesion,$conexion){

    $id_user = $sesion['id_usuario'];

    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id_user;";
    $consulta = mysqli_query($conexion, $sql);

    if($consulta && mysqli_num_rows($consulta)==1){
        $resultado = $consulta;
    }
    return $resultado; 

}

function obtenerRegistros($conexion,$tabla,$campo,$id){

    $sql = "SELECT COUNT($campo) FROM $tabla  ";
        
        if($tabla == 'usuarios'){
            $sql .= "WHERE $campo != $id ";
        }

        $totalResultado = mysqli_query($conexion, $sql);

        $total = mysqli_fetch_array($totalResultado);
        $total = (int) $total[0];

        return $total;
}

function obtenerDatos($conexion,$tabla,$condicion){

    $sql = "SELECT * FROM $tabla $condicion";
    $obtener = mysqli_query($conexion, $sql);

    return $obtener;
}


?>