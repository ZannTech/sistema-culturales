var URLactual = filename();
if(URLactual == "" || URLactual =="index.php"){
}else{
        $("#item-contact").css("display", "none");
}
function filename(){
    var rutaAbsoluta = self.location.href;   
    var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
    var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
    return rutaRelativa;  
}