window.addEventListener("scroll", function(){
  var containerNav = this.document.querySelector(".container_nav");
  containerNav.classList.toggle("abajo", this.window.scrollY>0);
})
// Seleccionar el elementos HTML con la clase 'drop_title' y almacenarlo en una variable
const usuariosTitle = document.querySelector('.drop_title');
const usuariosList = document.querySelector('.drop_list');
const dropArrow = document.querySelector('.drop_arrow');

// Agregar un 'escucha de eventos' al elemento 'usuariosTitle' que escucha por clics
usuariosTitle.addEventListener('click', () => {

  // Si el color de fondo actual del elemento 'usuariosTitle' no es 'rojo'
  if(usuariosTitle.style.backgroundColor != 'red'){
    // Establecer el color de fondo del elemento 'usuariosTitle' como 'rojo'
    usuariosTitle.style.backgroundColor = 'red';
  }else{
    // Establecer el color de fondo del elemento 'usuariosTitle' como '#24272F'
    usuariosTitle.style.backgroundColor = '#24272F';
  }

  // Alternar la clase 'active' en el elemento 'usuariosList'
  usuariosList.classList.toggle('active');

  // Alternar la clase 'drop_arrow--rotate' en el elemento 'dropArrow'
  dropArrow.classList.toggle('drop_arrow--rotate');
});

//segundo dropdown

// Seleccionar el elemento HTML con la clase 'drop_title_product' y almacenarlo en una variable
const productoTitle = document.querySelector('.drop_title_product');
const productoList = document.querySelector('.drop_list_product');
const dropArrow2 = document.querySelector('.drop_arrow2');

productoTitle.addEventListener('click', () => {

  // Si el color de fondo actual del elemento 'productoTitle' no es 'rojo'
  if(productoTitle.style.backgroundColor != 'red'){
    // Establecer el color de fondo del elemento 'productoTitle' como 'rojo'
    productoTitle.style.backgroundColor = 'red';
  }else{
    // Establecer el color de fondo del elemento 'productoTitle' como '#24272F'
    productoTitle.style.backgroundColor = '#24272F';
  }

  // Alternar la clase 'active2' en el elemento 'productoList'
  productoList.classList.toggle('active2');

  // Alternar la clase 'drop_arrow--rotate2' en el elemento 'dropArrow2'
  dropArrow2.classList.toggle('drop_arrow--rotate2');
});


//funcion para ocultar el menu lateral

// Seleccionar el elemento HTML con el id 'ocultar' y almacenarlo en una variable
const ocultarBtn = document.getElementById("ocultar");
const containerNav = document.querySelector(".container_nav");
const containerDerecha = document.querySelector(".contenedor_derecha");

// Agregar un 'escucha de eventos' al elemento 'ocultarBtn' que escucha por clics
ocultarBtn.addEventListener("click", () => {

  // Alternar la clase 'container-hide' en el elemento 'containerNav'
  containerNav.classList.toggle("container-hide");

  // Alternar la clase 'container-full' en el elemento '
  containerDerecha.classList.toggle("container-full");
});


const alerta = document.querySelector(".alerta");

alerta.innerHTML =  `<div class="message is-danger">
<div class="message-header">
    <p>Error al iniciar sesion</p>
</div>
<div class="message-body">
<strong>Usuario</strong> no encontrado o no cumple con los parametros!
</div>
</div>`;
alerta.style = `position:absolute;`