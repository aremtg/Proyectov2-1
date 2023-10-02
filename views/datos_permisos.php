<label for="instructor">Instructor:</label>
<form id="form-instructor" method="POST" onchange="document.getElementById('form-instructor').submit();">
<select id="instructor" name="instructor_permiso">
    <option value="">Selecciona un instructor</option>
    <?php
    // Realiza la consulta SQL para obtener los nombres de los instructores
    $consulta = "SELECT nombre_instructor FROM datos_permisos";
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
    
    <form action="./php/guardarDatosPermisos.php" method="POST">
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

<?php
// Verificar si se ha seleccionado un valor en el select
if (isset($_POST['instructor_permiso']) && !empty($_POST['instructor_permiso'])) {
    $nombreInstructorSeleccionado = limpiar_cadena($_POST['instructor_permiso']);

     // Realiza la consulta SQL para obtener los datos del instructor seleccionado
     $consulta = "SELECT * FROM datos_permisos WHERE nombre_instructor = '$nombreInstructorSeleccionado'";
     $resultado = mysqli_query($db, $consulta);
 
     if (mysqli_num_rows($resultado) > 0) {
         echo "<h2>Información del Instructor: $nombreInstructorSeleccionado</h2>";
         echo "<table border='1'>";
         echo "<tr><th>Nombre Instructor</th><th>Nombre Aprendiz</th><th>Ficha</th><th>Titulada</th><th>Ambiente</th></tr>";
 
         while ($fila = mysqli_fetch_assoc($resultado)) {
             echo "<tr>";
             echo "<td>" . $fila['nombre_instructor'] . "</td>";
             echo "<td>" . $fila['nombre_aprendiz'] . "</td>";
             echo "<td>" . $fila['ficha'] . "</td>";
             echo "<td>" . $fila['titulada'] . "</td>";
             echo "<td>" . $fila['ambiente'] . "</td>";
             echo "</tr>";
         }
 
         echo "</table>";
     } else {
         echo "No se encontraron datos para el instructor: $nombreInstructorSeleccionado";
     }
}
?>