$(document).ready(function(){$("#frm-update-user").on("submit",r=>{r.preventDefault();let a={},o=$("#tipo-user").val();"Administrador"==o?a={user:$("#user").val(),password:$("#password").val(),confirm:$("#confirm-password").val()}:"Encargado"==o?a={user:"",password:$("#password").val(),confirm:$("#confirm-password").val()}:"Alumno"==o&&(a={user:"",password:$("#password").val(),confirm:$("#confirm-password").val()}),a.password===a.confirm?$.ajax({url:"../../config/core/controller/controller.global.page.php?profile=edit",data:"password="+a.password+"&user="+a.user,cache:!1,method:"POST",beforeSend:function(){$("#loader").show()},success:function(r){$("#loader").hide(),1==r?Swal.fire("Cambios guardados correctamente","Se cerrará sesión","success").then(function(){window.location.reload()}):"contraseñas iguales"==r&&Swal.fire("Error","La contraseña no puede ser la misma actualmente registrada","error")}}):Swal.fire("Error","Las contraseñas no coinciden","error")})});