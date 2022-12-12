window.onload = function() {
    var contendedor = document.getElementById('contenedor_carga');
    contendedor.style.visibility = 'hidden';
    contendedor.style.opacity = '0';
    
}
function scrollEvent(top, left){
    window.scroll({
        top: top,
        left: left,
        behavior: 'smooth'
      });
}
