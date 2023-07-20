    <?php ob_start() ?>
    <div class="container_nav"><!--Abrimos un contenedor para la parte del navegador que esta a la izquierda-->
        <div class="logos-nav">
            <h1 class="saci">SSACI</h1><span class="separa_logos"></span><img class="logoSena" src="images/logoSena.svg" alt="">
        </div>
        <nav class="nav">
            <a class="nav_a" href="index.php?vista=home">Home</a>
            <a class="nav_a" href="index.php?vista=perfil">Perfil</a>
            <a class="nav_a" href="index.php?vista=usuarios_lista">Usuarios</a>
            <a class="nav_a" href="index.php?vista=articulos">Articulos</a>
            <a class="nav_a" href="index.php?vista=aprendices_lista">Aprendices</a>
            <a class="nav_a" href="index.php?vista=tituladas_lista">Tituladas</a>
            <a class="nav_a" href="index.php?vista=registro_lista">Registros</a>
        </nav>
        <div class="py-6 cont_user"><!--se abre un contenedor para agregar una imagen y unos titulos-->
            <div class="nombre_rol">
                <h3 class="user-nombre"> <?=$_SESSION['usuario']['usuario_usuario'];?> </h3>
                <h4 class="user-rol"><?=$_SESSION['usuario']['rol_usuario'];?></h4>
            </div>
            <img class="img_user" src="./images/user.png" alt="Foto de perfil" >
        </div>
    </div>
<div class="contenedor_derecha pl-5"><!--Abrimos un contenedor para la parte de la derecha-->
    <div class="btn-cerrar-sesion">
        <img src="./images/boton-left.png" id="ocultar" class="button is-small is-info" alt="">
        <a href="./php/logout.php" class="button has-text-centered is-danger"><img src="./images/log-out.png" class="boton pr-2" alt="">Cerrar Sesion</a>
    </div>     