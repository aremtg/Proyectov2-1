<article class="panel-heading mb-5"> 
    <div class="is-flex">
        <h3 class="is-size-2 pt+1">
        Registros
        </h3>
    </div>

    <p class="is-size-6">
        Todos los registros!
    </p>     
</article>

<?php if(isset($_SESSION['delete'])): ?>
    <div class='message is-danger'>
        <?= $_SESSION['delete'];?>
    </div>
<?php endif;  ?>
<?php BorrarErrores(); ?>
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
    $url="index.php?vista=registro_lista&page=";  //esta variable va a contener la url completa del sistema de la tabla
    $registros=8;                               // esta va a mostrar el numero total de registrados en cada pagina
    $busqueda="";                                //esta variable se va a usar para realizar la busqueda

    require_once('./php/lista_registro.php');
    
?>

