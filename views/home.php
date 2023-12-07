    <article class="panel-heading"> 
    <h3 class="" ><span class="ssaci-cont">SSACI</span></h3>
            <p class="">
                Sistema de Seguimiento Acceso y Control de Ingreso...
            </p>     
    </article>
        <?php
            $totalAprendiz = obtenerRegistros($db,'aprendices','id_aprendiz',null);
            $totalUsuarios = obtenerRegistros($db,'usuarios','id_usuario',$_SESSION['usuario']['id_usuario']);
            $totaltitulada = obtenerRegistros($db,'tituladas','id_titulada',null);
            $totalarticulo = obtenerRegistros($db,'articulos','id_articulo',null);
            $totalRegistro = obtenerRegistros($db,'registro','id_registro',null);
        ?>

<div class=" panel_iconos rounded-3xl shadow-sm py-3"><!--Abrimos un contenedor para los botones de navegacion-->
    <a href="index.php?vista=usuarios_lista" class="flex flex-col justify-center items-center bg-white rounded-3xl p-8 transition duration-300 transform hover:scale-90">
        <h2 class="text-2xl font-semibold mb-2 text-gray-800 hover:text-gray-900">USUARIOS</h2>
        <p class="text-sm text-gray-600"><?= $totalUsuarios; ?> Registrados</p>
    </a>
    <a href="index.php?vista=aprendices_lista" class="flex flex-col justify-center items-center bg-white rounded-3xl p-8 transition duration-300 transform hover:scale-90">
        <h2 class="text-2xl font-semibold mb-2 text-gray-800 hover:text-gray-900">APRENDICES</h2>
        <p class="text-sm text-gray-600"><?= $totalAprendiz; ?> Registrados</p>
    </a>

    <a href="index.php?vista=tituladas_lista" class="flex flex-col justify-center items-center bg-white rounded-3xl p-8 transition duration-300 transform hover:scale-90">
        <h2 class="text-2xl font-semibold mb-2 text-gray-800 hover:text-gray-900">TITULADAS</h2>
        <p class="text-sm text-gray-600"><?= $totaltitulada; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="flex flex-col justify-center items-center bg-white rounded-3xl p-8 transition duration-300 transform hover:scale-90">
        <h2 class="text-2xl font-semibold mb-2 text-gray-800 hover:text-gray-900">ARTICULOS</h2>
        <p class="text-sm text-gray-600"><?= $totalarticulo; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="flex flex-col justify-center items-center bg-white rounded-3xl p-8 transition duration-300 transform hover:scale-90">
        <h2 class="text-2xl font-semibold mb-2 text-gray-800 hover:text-gray-900">REGISTROS</h2>
        <p class="text-sm text-gray-600"><?= $totalRegistro; ?> Registrados</p>
    </a>
    
</div><!--cerramos contenedor para los botones de navegacion-->

<div class="box-button">
    <a href="./views/aplicacionPermisos.php" target="_blank" class="my-button button-clr-morado">Aplicacion Permisos</a>
    <a href="./views/aplicacion.php" target="_blank" class="my-button button-clr-verde">Aplicacion Ingresos</a>
</div>

