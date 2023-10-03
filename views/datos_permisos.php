<label for="instructor">Instructor:</label>
<form id="form-instructor" class="form_ajax" method="POST" onchange="document.getElementById('form-instructor').submit();">
<select id="instructor" name="instructor_permiso">
    <option value="">Selecciona un instructor</option>
    <?php
    // Realiza la consulta SQL para obtener los nombres de los instructores
    $consulta = "SELECT nombre_instructor FROM lista_instructores";
    $resultado = mysqli_query($db, $consulta);

    // Verifica si la consulta se ejecutó correctamente
    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $nombreInstructor = $fila['nombre_instructor'];
            echo "<option value=\"$nombreInstructor\">$nombreInstructor</option>";
        }
        mysqli_free_result($resultado); // Liberar el resultado
    } else {
        echo "Error en la consulta: " . mysqli_error($db);
    }
    ?>
</select>
</form>


<div>
<h1>Formulario de Datos de Permisos</h1>
    <form action="./php/guardarDatosPermisos.php" class="form_ajax" method="POST">
        <label for="nombreInstructor">Nombre del Instructor:</label>
        <input type="text" id="nombreInstructor" name="nombre_instructor" required><br><br>

        <label for="nombreAprendiz">Nombre del Aprendiz:</label>
        <input type="text" id="nombreAprendiz" name="nombre_aprendiz" required><br><br>

        <label for="ficha">Ficha:</label>
        <input type="text" id="ficha" name="ficha" required><br><br>

        <label for="titulada">Titulada:</label>
        <input type="text" id="titulada" name="titulada"><br><br>

        <label for="ambiente">Ambiente:</label>
        <input type="text" id="ambiente" name="ambiente" required><br><br>

        <input type="submit" value="Guardar">
    </form>
</div>