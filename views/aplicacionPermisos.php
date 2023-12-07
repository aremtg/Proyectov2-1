<div class="flex flex-wrap gap-4">
    <?php
    require_once('../php/conexion.php');

    $result = $db->query("SELECT imagenes FROM imagenes_tabla");

    if ($result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $imagen = $fila['imagenes'];
    ?>
            <div class="rounded-lg shadow-lg overflow-hidden">
                <img class="w-full" src="<?php echo $imagen; ?>" alt="Imagen">
            </div>
    <?php
        }
    } else {
        echo '<p class="text-red-500">No existen imágenes en la base de datos.</p>';
    }
    $db->close();
    ?>
</div>
