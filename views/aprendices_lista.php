<article class="panel-heading"> 
        <div class="is-flex">
            <h3 class="is-size-2">
            APRENDICES
            </h3>
        </div>

        <p class="is-size-6">
            Aprendices Activos!
        </p>     

    </article>

    <ul class="ul-mini-nav">
        <li >
            <a class="" href="index.php?vista=aprendiz_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li class="is-active">
            <a>
                <span>LISTA APRENDICES</span>
            </a>
        </li>
    </ul>

    <?php 
    if(!isset($_GET['page'])){
        $pagina = 1;
    }else{
        $pagina = (int)$_GET['page'];

        if($pagina <= 1){
            $pagina = 1;
        }
    }

    $pagina = limpiar_cadena($pagina);
    $url = "index.php?vista=aprendices_lista&page=";  //esta variable va a contener la url completa del sistema de la tabla
    $registros = 10;                               // esta va a mostrar el numero total de registrados en cada pagina
    $busqueda = "";                                //esta variable se va a usar para realizar la busqueda

    require('./php/lista_aprendices.php');
?>
