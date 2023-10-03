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