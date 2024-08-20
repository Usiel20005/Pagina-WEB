/*Seleccionar los elementos del dom*/
let imagenes = document.querySelectorAll('.galeria__img');
//Contenedor de la imagen
let modal = document.querySelector('#modal');
//selecciona la imagen dentro del modal
let imagen = document.querySelector('#modal_img');
//selecciona el elemento don el id del boton
let boton = document.querySelector('#modal_boton');

//añadir de eventos de click a cada imagen
for (let i = 0; i < imagenes.length; i++) {
    imagenes[i].addEventListener('click', function (e) {
    //alert('Haz dado click');
    modal.classList.toggle("modal--open");
    let src= e.target.src;
    imagen.setAttribute("src",src);
    })
}

//añadir evento del cierre de la imagen
boton.addEventListener('click',function(){
    modal.classList.toggle("modal--open");
});