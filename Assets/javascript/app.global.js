function disableselect(e) {
    return false
}

function reEnable() {
    return true
}
document.onselectstart = new Function("return false")

if (window.sidebar) {
    document.onmousedown = disableselect
    document.onclick = reEnable
}
document.oncontextmenu = function() { return false }
var styles = [
    'background-color: black', 'font-size: 30px', 'font-weight: bold', 'color: red'
].join(';');

console.log('%cFUNCIÓN SOLO PARA DESARROLLADORES, SI NO QUIERES PONER EN PELIRO TU IDENTIDAD, NO USES ESTAS FUNCIONES TODO QUEDA GUARDADO QUIEN Y NO LA USA. ©RC ADVANCE   ', styles);