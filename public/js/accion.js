function accion(){
    console.log('boton funcionando'); // solo se coloco para visualizar en consola que el boton funciona al dar click
    
    var ancla = document.getElementsByClassName('nav_menu'); //detecta la variable que que contenga la clase "nav_enlace"
    
    for( var i = 0; i < ancla.length; i++){ //este ciclo se utiliza para leer todas las variables que tengan la clase nav_enlace
        ancla[i].classList.toggle('ocultar'); //el toggle hace aparecer o desaparecer las variables que tienen la clase "ocultar" 
    }
}

function validarCampo(){


    if ($('cargo').val().length<1){
        alert('Seleccione un cargo')
    }
}
