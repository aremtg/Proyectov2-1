<?php require_once('../php/main.php');
    require_once('../php/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos</title>
    <link rel="stylesheet" href="../css/aplicacion.css">
</head>
<body>

    <div class="contenido">
    <div class="ventana box">
        <form action="./resultado_aplicacion.php" method="POST" autocomplete="off" >
            <div class="field">
                <label class="label">Documento</label>
                <div class="control">
                <input class="input" type="text" placeholder="# Documento" name="consulta" >
                </div>
            </div>
            <div class="has-text-centered">
            <button type="submit" class="btn-ingresar button is-success">Ingresar</button>
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'documento'):"" ?>
        </form>
    </div>
    <?php BorrarErrores(); ?>

</body>
</html>