    <article class="panel-heading"> 
    <h3 class=" is-size-2" ><span class="ssaci-cont">SSACI</span> para el SENA</h3>
            <p class="is-size-6 ">
                Sistema de Seguimiento y Control de Ingreso...
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
        <h2 class="title is-5">USUARIOS</h2>
        <p class="is-size-5 pb-4"><?= $totalUsuarios; ?> Registrados</p>
    </a>
    <a href="index.php?vista=aprendices_lista" class="iconos">
        <h2 class="titulo_productos title is-5">APRENDICES</h2>
        <p class="is-size-5"><?= $totalAprendiz; ?> Registrados</p>
    </a>

    <a href="index.php?vista=tituladas_lista" class="iconos">
        <h2 class="titulo_productos title is-5">TITULADAS</h2>
        <p class="is-size-5"><?= $totaltitulada; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos title is-5">ARTICULOS</h2>
        <p class="is-size-5"><?= $totalarticulo; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos title is-5">REGISTROS</h2>
        <p class="is-size-5"><?= $totalRegistro; ?> Registrados</p>
    </a>
    
</div><!--cerramos contenedor para los botones de navegacion-->

<div class="a_iniciar_aplicacion">
    <img class="img_guardia" src="./images/guardia-home.svg" alt="">
    <a href="./views/aplicacion.php" target="_blank" class="button is-primary is-medium title is-4">Iniciar Aplicación</a>
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
