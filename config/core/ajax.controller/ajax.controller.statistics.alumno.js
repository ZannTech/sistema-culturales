$(document).ready(function(){var o=$("#session-id").val();gethours(o)});var gethours=function(o){$.ajax({url:"../../config/core/controller/controller.global.page.php?get-hours=alumno",data:"id="+o,method:"POST",success:function(o){let e=0;0!=o&&(o=JSON.parse(o)).forEach(o=>{e+=parseFloat(o.horas)}),$.ajax({url:"../../config/core/controller/controller.global.page.php?get-percents=alumno",method:"POST",data:"tipo=taller&hrs="+e,success:function(o){o>=100&&(Swal.fire("Has concluido con tu taller cultural","Por favor comunicate con la maestra","success"),o=100),$("#txt-p").html(o+"%"),$("#per").css("width",o+"%")}})},beforeSend:function(){}})};