    <?php ob_start() ?>
    <div class="myNav fixed h-70 px-20 rounded-full bg-white shadow-sm flex justify-between items-center gap-4 z-30"><!--Abrimos un contenedor para la parte del navegador que esta a la izquierda-->
        <div class="logos-nav">
            <h1 class="saci">SSACI</h1><span class="separa_logos"></span><img class="logoSena" src="images/logoSena.svg" alt="">
        </div>
        
            <nav class="nav"  id="nav-menu">
                <a class="nav_a" href="index.php?vista=home">
                    <img src="images/iconos/casa-icon.svg" alt="">
                    <span class="tiptext">Home</span>
                </a>
                <a class="nav_a" href="index.php?vista=articulos">
                    <img src="images/iconos/articulos-icon.svg" alt="">
                    <span class="tiptext">Articulos</span>
                </a>
                <a class="nav_a" href="index.php?vista=aprendices_lista">
                <img src="images/iconos/aprendiz-icon.svg" alt="">
                    <span class="tiptext">Aprendices</span>
                </a>
                <a class="nav_a" href="index.php?vista=tituladas_lista">
                    <img src="images/iconos/titulada-icon.svg" alt="">
                    <span class="tiptext">Tituladas</span>
                </a>
                <a class="nav_a" href="index.php?vista=registro_lista">
                    <img src="images/iconos/registro-icon.svg" alt="">
                    <span class="tiptext">Lista de registro</span>
                </a>
                <a class="nav_a" href="index.php?vista=usuarios_lista">
                    <img src="images/iconos/registro-icon.svg" alt="">
                    <span class="tiptext">Usuarios</span>
                </a>
                <a class="nav_a" href="index.php?vista=papel_permisos">
                    <img src="images/iconos/registro-icon.svg" alt="">
                    <span class="tiptext">Permisos</span>
                </a>
            </nav>
            <div class="py-6 cont_user"><!--se abre un contenedor para agregar una imagen y unos titulos-->
                <div class="nombre_rol">
                    <h3 class="user-nombre"> <?= $_SESSION['usuario']['usuario_usuario'];?> </h3>
                    <h4 class="user-rol"><?= $_SESSION['usuario']['rol_usuario']; ?></h4>
                </div>
                <a class="user_a" href="index.php?vista=perfil">
                    <img class="img_user" src="./images/user.png" alt="Foto de perfil">
                    <span class="tiptext">Perfil</span>
                </a>
            </div>
            <a href="./php/logout.php" class="btn-cerrar-sesion salir_a">
                <img src="images/iconos/salir-icon.svg" class="salir-icon" alt="">
                <span class="tiptext">Salir</span>
            </a>
            <div class="menu-icon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

    </div>
    <div class="contenedor_contenido"><!--Abrimos un contenedor para la parte de la derecha-->
       