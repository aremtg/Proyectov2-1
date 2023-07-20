<?php 
require_once('conexion.php');
require_once('main.php');

$id_usuario = limpiar_cadena($_POST['usuario']);
$titulada = limpiar_cadena($_POST['titulada']);
$tipodoc = limpiar_cadena($_POST['tipodocumento']);
$documento = limpiar_cadena($_POST['documento_aprendiz']);
$nombre = limpiar_cadena($_POST['nombre_aprendiz']);
$apellido = limpiar_cadena($_POST['apellido_aprendiz']);
$correo = limpiar_cadena($_POST['correo_aprendiz']);
$celular = limpiar_cadena($_POST['cel_aprendiz']);
$articulos = limpiar_cadena($_POST['articulos']);
$codigo1 = limpiar_cadena($_POST['codigo1']);
$descripcion1 = limpiar_cadena($_POST['descripcion1']);
$codigo2 = limpiar_cadena($_POST['codigo2']);
$descripcion2 = limpiar_cadena($_POST['descripcion2']);

$errores = [];

## VERIFICAR USUARIO ##
if(is_numeric($id_usuario) && !empty($id_usuario)){

    $check_user = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario;";
    $execute = mysqli_query($db, $check_user);

    if(mysqli_num_rows($execute)>0){    

        $usuario = mysqli_fetch_assoc($execute);
        $id_usuario = $usuario['id_usuario'];

    }else{
        $errores['usuario'] = "Este usuario no existe!";
    }
}else{
    $errores['usuario'] = "El usuario no esta definido correctamente!";
}


## VERIFICAR TITULADA ##
if(is_numeric($titulada) && !empty($titulada)){

    $check_titulada = "SELECT * FROM tituladas WHERE id_titulada = $titulada;";
    $execute_titulada = mysqli_query($db, $check_titulada);

    if(mysqli_num_rows($execute_titulada)>0){    

        $titulada = mysqli_fetch_assoc($execute_titulada);
        $id_titulada = $titulada['id_titulada'];
        
    }else{
        $errores['titulada'] = "La titulada seleccionada no existe!";
    }
}else{
    $errores['titulada'] = "La titulada no esta definida correctamente!";
}


## VERIFICAR DOCUMENTO ##
if(is_numeric($documento) && !empty($documento)){
    $check_doc = "SELECT * FROM aprendices WHERE documento = '$documento';";
    $execute_doc = mysqli_query($db, $check_doc);

    if(mysqli_num_rows($execute_doc)==1){    
        $errores['documento'] = "El documento ingresado ya esta registrado!";
    }
}else{
    $errores['documento'] = "El documento ingresado no cumple los parametros!";
}

## VERIFICAR NOMBRE ##
if(!empty($nombre) && verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
    $errores['nombre'] = "El nombre no cumple los parametros";
}else{
    $nombre = ucwords(strtolower($nombre));
}

## VERIFICAR APELLIDO ##
if(!empty($apellido) && verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
    $errores['apellido'] = "El apellido no cumple los parametros";
}else{
    $apellido = ucwords(strtolower($apellido));
}

## VERIFICAR CORREO ##
if(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)){

    $check_email = "SELECT * FROM aprendices WHERE email_aprendiz = '$correo';";
    $execute_email = mysqli_query($db, $check_email);

    if(mysqli_num_rows($execute_email)==1){    
        $errores['correo'] = "El correo ya fue registrado!";
    }
}else{
    $errores['correo'] = "El correo ingresado no es valido!";
}

## VERIFICAR CELULAR ##
if(!is_numeric($celular) && verificar_datos("[0-9]{3,15}",$celular)){
    $errores['celular'] = "El numero de contacto no cumple con los parametros";
}

## VERIFICAR ARTICULO ##
if(empty($articulos) && !is_numeric($articulos)){
    $errores['articulos'] = "el arituculo no existe!";
}

## VERIFICAR  CODIGO 1 ##
if(!is_numeric($codigo1) || empty($codigo1)){
    $errores['codigo1'] = "El codigo 1 no cumple con los parametros";
}


## VERIFICAR DESCRIPCION 1 ##
if(empty($descripcion1)){
    $errores['descripcion1'] = "La descripcion1 no puede estar vacia";
}else{
    $descripcion1 = ucfirst($descripcion1);
}

## VERIFICAR  CODIGO 2 ##

if(empty($codigo2)){
    $codigo2 = "";
}else{
    if(!is_numeric($codigo2)){
    $errores['codigo2'] = "El codigo 2 no cumple con los parametros";
    }
}

## VERIFICAR DESCRIPCION 2 ##
if(empty($descripcion2)){
    $descripcion2 = "";
}else{
    $descripcion2 = ucwords(strtolower($descripcion2));
}

if(count($errores)==0){

    $sql = "INSERT INTO aprendices VALUES (null, $id_usuario,
    $id_titulada,
    '$tipodoc',
    '$documento',
    '$nombre',
    '$apellido',
    '$correo',
    '$celular',
    '$codigo1',
    '$descripcion1',
    '$codigo2',
    '$descripcion2',
    CURDATE(),
    '$articulos');";

    $guardar = mysqli_query($db, $sql);

    if($guardar){
        $_SESSION['registrado'] = "
            <div class='message-header title is-5 m-0'>
                <p>Registro exitoso!</p>
            </div>
            <div class='message-body is-size-6'>
                El Aprendiz <strong>$nombre</strong>  ha sido registrado correctamente.
            </div>";
    }else{
        $_SESSION['errorRegistrado'] = "
            <div class='message is-danger title is-5 m-0'>
                <div class='message-header'>
                    <p>Error de Registro!</p>
                </div>
                <div class='message-body is-size-6'>
                    El aprendiz no se ha podido registrar comuniquese con soporte.
                </div>
            </div>";
    }
}else{
    $_SESSION['errores'] = $errores;
}

mysqli_close($db);

header('location:../index.php?vista=aprendiz_nuevo');

?>