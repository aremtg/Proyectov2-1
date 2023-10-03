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

<div class="panel_iconos"><!--Abrimos un contenedor para los botones de navegacion-->
    <a href="index.php?vista=usuarios_lista" class="iconos">
        <h2 class="">USUARIOS</h2>
        <p class=""><?= $totalUsuarios; ?> Registrados</p>
    </a>
    <a href="index.php?vista=aprendices_lista" class="iconos">
        <h2 class="titulo_productos">APRENDICES</h2>
        <p class=""><?= $totalAprendiz; ?> Registrados</p>
    </a>

    <a href="index.php?vista=tituladas_lista" class="iconos">
        <h2 class="titulo_productos">TITULADAS</h2>
        <p class=""><?= $totaltitulada; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos">ARTICULOS</h2>
        <p class=""><?= $totalarticulo; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos">REGISTROS</h2>
        <p class=""><?= $totalRegistro; ?> Registrados</p>
    </a>
    
</div><!--cerramos contenedor para los botones de navegacion-->

<div class="box-button">
    <a href="./views/aplicacion.php" target="_blank" class="my-button button-clr-morado">Aplicacion Permisos</a>
    <a href="./views/aplicacion.php" target="_blank" class="my-button button-clr-verde">Aplicacion Ingresos</a>
</div>

<div class="texto">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur omnis dolores voluptatem culpa vero repellendus aliquid qui aut amet adipisci, deserunt id? Soluta repudiandae eum omnis voluptatem? Veniam, provident alias.
    Labore corrupti ea incidunt eligendi dolorem iusto voluptatum ex, eos voluptates, possimus omnis quo perspiciatis, repudiandae debitis quidem maiores atque magni odit nisi tempora nihil. Dicta et velit sequi provident.
    Rem delectus sequi eum possimus consequuntur perspiciatis laborum vitae cumque dolores, fugiat modi ad consequatur. Delectus obcaecati necessitatibus quasi distinctio qui ex id excepturi. Repellat pariatur nostrum veniam corrupti ducimus.
    </p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur omnis dolores voluptatem culpa vero repellendus aliquid qui aut amet adipisci, deserunt id? Soluta repudiandae eum omnis voluptatem? Veniam, provident alias.
    Labore corrupti ea incidunt eligendi dolorem iusto voluptatum ex, eos voluptates, possimus omnis quo perspiciatis, repudiandae debitis quidem maiores atque magni odit nisi tempora nihil. Dicta et velit sequi provident.
    Rem delectus sequi eum possimus consequuntur perspiciatis laborum vitae cumque dolores, fugiat modi ad consequatur. Delectus obcaecati necessitatibus quasi distinctio qui ex id excepturi. Repellat pariatur nostrum veniam corrupti ducimus.
    </p>
</div>
