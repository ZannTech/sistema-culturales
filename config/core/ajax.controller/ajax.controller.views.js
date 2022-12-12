$(document).ready(function() {
    var n = $("#c-id").val();
    renderDoc(n),
        $(".sp").html("<br><br><br><br><br>"),
        $("#btn-update").on("click", function() {
            fetchRequest(request);
        });
});
var renderDoc = function(n) {
    $.ajax({
        url: "../../config/core/controller/controller.global.page.php?evidencia=fetch-ev-id",
        method: "POST",
        data: "id=" + n,
        success: function(nx) {

            $("#loader").hide();
            let e = "";
            0 == n ?
                (e =
                    ' \n                <div class="sp"></div>\n                <div class="col-lg-12">\n                    <div class="abs-center">\n                    <i class="fas fa-exclamation-triangle fa-5x"></i>\n                    </div>\n                </div>\n                <div class="col-lg-12">\n                    <div class="abs-center">\n                    <br>Comentario no encontrado, por favor vuelve a buscar...\n                    </div>\n                </div>\n              \n                ') :
                ((Response = JSON.parse(nx)),
                    (Messages = Response),
                    Messages.forEach((n) => {
                        e += `   \n                <div class="col-lg-12 pt-4">\n                    <div class="card">\n                        <div class="card-body">\n                            <h2 class="card-title text-right">Evidencia</h2>\n                            <p class="card-text">Enviado por: <b>${n.publicador}</b> el: <b>${n.fecha}</b></p>\n                            <p><hr color="orange"></p>\n                            <p>${n.cuerpo}</p>\n                            <div class="sp"></div>\n                        </div>\n                        <div class="col-lg-12">\n      <p><hr color="orange"><b> Retroalimentación: ${n.nota}</b></p>                            </div>\n                    </div>\n                    \n                </div>\n            `;
                    })),
                $("#container").html(e);
        },
        beforeSend: function(n) {
            $("#loader").show();
        },
    });
};