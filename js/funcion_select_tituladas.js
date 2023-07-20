// Obtener el campo de entrada de texto y el contenedor de resultados
var campoBusqueda = $("#texto-busqueda");
var contenedorResultados = $("#resultado-busqueda");

// Escuchar el evento "input" para realizar la búsqueda en tiempo real
campoBusqueda.on("input", function() {
// Obtener el texto de búsqueda y escapar caracteres especiales
var busqueda = campoBusqueda.val().replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");

// Verificar si el campo de búsqueda está vacío
if (busqueda.trim() === "") {
    // Mostrar todos los resultados de la consulta
    contenedorResultados.empty(); // Limpiar el contenedor de resultados o mostrar un mensaje de "sin resultados"
    return;
}

// Enviar la solicitud de búsqueda mediante AJAX
$.ajax({
    url: "php/modal_tituladas.php",
    method: "POST",
    data: { busqueda: busqueda },
    success: function(response) {
    // Mostrar los resultados de la búsqueda en el contenedor
    contenedorResultados.html(response);
    }
});
});

$(document).ready(function() {
    $('#guardarBtn').click(function() {
    var primerCheckboxSeleccionado = $('input[type="checkbox"]:checked').first().val();
    $('#mostrarInput').val(primerCheckboxSeleccionado); // Mostrar el primer valor seleccionado en el input

    $('input[name="id_titulada"]').val(primerCheckboxSeleccionado);
    $('#miFormulario').submit();
    $('#modal_titu').removeClass('is-active'); // Cierra el modal
    });
});





