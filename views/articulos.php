<?php require_once('./php/conexion.php'); ?>
<article class="panel-heading mb-5"> 
    <div class="is-flex">
            <h3 class=" is-size-2 " >ARTICULOS</h3>
    </div>
        <p class="is-size-5">
            Articulos registrados!
        </p>     
</article>

<div class="tabs is-centered is-boxed">
    <ul>
        <li>
            <a href="index.php?vista=articulo_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li class="is-active">
            <a href="index.php?vista=articulos">
                <span>LISTA ARTICULOS</span>
            </a>
        </li>
    </ul>
</div>

<!-- SECCION PARA EL BUSCADOR CON PHP -->
<div class="mb-4">
        <form action="" method="POST" autocomplete="off">
            <label for="search" class="label">Ingrese que articulo deseas buscar con PHP</label>
        <input class="input mb-3" type="search" name="busqueda"> 
        <br>
        <button class="button is-link" type="submit" name="enviar">Buscar</button> 
</div>

<?php $where="";

if(isset($_POST['enviar'])){
    $busqueda = $_POST['busqueda'];
        if (isset($_POST['busqueda'])){
            $where = "WHERE nombre_articulo LIKE '%".$busqueda."%'";
        }

} ?>
<!-- TERMINA LA SECCION DEL BUSCADOR -->

<!-- SECCION PARA EL BUSCADOR CON js -->
<!-- <div class="container-fluid">
    <form class="d-flex">
    <label for="search" class="label">Ingrese que articulo deseas buscar con JS</label>
        <input class="light-table-filter input" data-table="table_id" type="text">
        <hr>
    </form>
</div> -->
<!-- TERMINA LA SECCION DEL BUSCADOR -->
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth table_id">
    <thead>
        <tr class="has-text-centered">
            <th>#</th>
            <th>Nombre Articulo 1</th>
            <th>Nombre Articulo 2</th>
        </tr>
    </thead>
    <tbody>
<?php 
$resultado = obtenerDatos($db,'articulos',$where);
$contador = 1;
while($datos = mysqli_fetch_array($resultado)){
    
    ?>

        <tr class="has-text-centered">
            <td><?= $contador;?></td>
            <td><?= $datos['nombre_articulo']?></td>
            <td><?= $datos['nombre_articulo_2']?></td>
        </tr>

<?php $contador++; 
    }; ?>     

    </tbody>
</table>

<script src="./js/buscador.js"></script>