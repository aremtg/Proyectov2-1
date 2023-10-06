let meses = ["Enero","Febrero","Marzo","Abril",
            "Mayo","Junio","Julio","Agosto","Septiembre",
            "Octubre","Noviembre","Diciembre"]
let date = new Date();

let diaMes = date.getDate();
let mes = meses[date.getMonth()];
let año = date.getFullYear();
let lo = date.getMonth();
console.log(lo);
let fecha = document.querySelector(".fecha");
fecha.textContent = diaMes + "/" + mes + "/" + año;

setInterval(() => {
  let boxHora = document.querySelector(".hora");
  let fechaActual = new Date();
  let hora = fechaActual.getHours();
  let minutos = fechaActual.getMinutes();
  let segundos = fechaActual.getSeconds();
  if (minutos <= 9) {
    boxHora.textContent = hora + ":0" + minutos + ":" + segundos;

  }else{
    boxHora.textContent = hora + ":" + minutos + ":" + segundos;
  }
}, 1000);

function cambiaAMPM(){
  var periodo = document.querySelector(".periodo");
  if (periodo.textContent=="p.m") {
    periodo.textContent= "a.m";
  } else {
    periodo.textContent= "p.m";
  }
}
// function generarPermiso() {

//   var resultado = document.querySelector(".resultado");
//   var img = resultado.querySelector("img");

//   if (img) {
//   resultado.innerHTML = ` `;
//   }
//   html2canvas(document.querySelector(".hoja")).then(function(captura){
//       // el SRC DE LA IMG crear
//       var img = new Image();
//       img.src = captura.toDataURL();

//       // se generooo y se agrego
//       resultado.innerHTML = ` `;
//       resultado.appendChild(img);
      
//   });
// }
// function cancelarPermiso(){
// var resultado = document.querySelector(".resultado");
// resultado.innerHTML = `<h1>Aqui se generara su permiso</h1> `;

// }
function generarPermiso() {
  var resultado = document.querySelector(".resultado");
  var img = resultado.querySelector("img");

  if (img) {
    resultado.innerHTML = '';
  }

  html2canvas(document.querySelector(".hoja")).then(function (captura) {
    // Crear un campo oculto para almacenar la imagen generada
    var imagenGenerada = captura.toDataURL();
    var inputOculto = document.createElement('input');
    inputOculto.type = 'hidden';
    inputOculto.name = 'imagen_generada';
    inputOculto.value = imagenGenerada;

    // Crear un formulario
    var formulario = document.createElement('form');
    formulario.method = 'POST';
    formulario.action = './php/cargarImagen.php'; 
    formulario.enctype = 'multipart/form-data'; // Importante para enviar archivos

    formulario.appendChild(inputOculto);

    // Crear un botón para enviar el formulario
    var botonEnviar = document.createElement('button');
    botonEnviar.type = 'submit';
    botonEnviar.textContent = 'Enviar Imagen';

    formulario.appendChild(botonEnviar);

    // Agregar el formulario a .resultado
    resultado.innerHTML = '';
    resultado.appendChild(formulario);
  });
}


// document.getElementById("instructor").addEventListener("change", function() {
//   var formEstudiante = document.getElementById("form-estudiante");
//   var instructorSeleccionado = this.value;

//   // Habilitar o deshabilitar el formulario de estudiantes según la selección del instructor
//   if (instructorSeleccionado === "") {
//       formEstudiante.style.display = "none";
//   } else {
//       formEstudiante.style.display = "block";
//   }
// });