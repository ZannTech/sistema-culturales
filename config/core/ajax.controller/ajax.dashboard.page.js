function imprimirElemento(e) {
    var o = window.open("", "print", "height=700,width=1300");
    return (
        o.document.write("<html><head><title>" + document.title + "</title>"),
        o.document.write(
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">'
        ),
        o.document.write(
            '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto+Condensed:wght@300;400&display=swap">'
        ),
        o.document.write('<link rel="stylesheet" href="css/app.css">'),
        o.document.write(
            '<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">'
        ),
        o.document.write('<link rel="stylesheet" href="css/sb-admin-2.min.css">'),
        o.document.write(
            '\x3c!-- Custom scripts for all pages--\x3e\n    <script src="js/sb-admin-2.min.js"></script>\n    \n    \x3c!-- Page level plugins --\x3e\n    <script src="vendor/chart.js/Chart.min.js"></script>\n    \n    \x3c!-- Page level custom scripts --\x3e\n    <script src="js/demo/chart-area-demo.js"></script>\n    <script src="js/demo/chart-pie-demo.js"></script>'
        ),
        o.document.write("</head><body >"),
        o.document.write(e.innerHTML),
        o.document.write("</body></html>"),
        o.document.close(),
        o.focus(),
        (o.onload = function() {
            o.print(), o.close();
        }), !0
    );
}

function getDataCount() {
    $.ajax({
        url: "../../config/core/controller/controller.global.page.php?dashboard",
        success: function(e) {
            "Key de acceso no identificada, estos datos solo los puede saber el administrador, por favor contacta a soporte." !=
            e &&
                ((e = JSON.parse(e)).forEach((e) => {
                        datos = {
                            count_servicio: e.count_servicio,
                            count_alumno: e.count_alumno,
                            count_alumno_hombre: e.count_alumno_hombre,
                            count_alumno_mujer: e.count_alumno_mujer,
                            count_comments: e.count_comments,
                            count_preregistros: e.count_preregistros,
                            count_pre_hombre: e.count_pre_hombre,
                            count_pre_mujer: e.count_pre_mujer,
                        };
                    }),
                    $("#c-serv").html(datos.count_servicio),
                    $("#c-alumnos").html(datos.count_alumno),
                    $("#c-pre").html(datos.count_preregistros),
                    $("#c-com").html(datos.count_comments),
                    chart(
                        datos.count_pre_mujer,
                        datos.count_pre_hombre,
                        datos.count_alumno_mujer,
                        datos.count_alumno_hombre
                    )),
                $("#loader").hide();
        },
        beforeSend: function() {
            $("#loader").show();
        },
    });
}

function chart(e, o, t, r) {
    var s = document.getElementById("myChart").getContext("2d");
    new Chart(s, {
        type: "bar",
        data: {
            labels: [
                "Pre-registros Mujer",
                "Pre-registros Hombre",
                "Alumnas registradas en el programa",
                "Alumnos registrados en el programa",
            ],
            datasets: [{
                label: "Géneros registrados",
                data: [e, o, t, r],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                ],
                borderWidth: 1,
            }, ],
        },
        options: { scales: { y: { beginAtZero: !1 } } },
    });
}
$(document).ready(() => {
    $("#generate-report").on("click", () => {
            imprimirElemento(document.querySelector("#report"));
        }),
        getDataCount(),
        $("#update-data").on("click", () => {
            getDataCount();
        }),
        $(".sp").html("<br><br>"),
        $("#go-to-comments").on("click", () => {
            window.location.replace("Comentarios");
        }),
        $("#listas").on("click", () => {
            window.location.replace("Listas?user=alumno"), $("#listas").css("cursor", "hand");
        }),
        $("#prer").on("click", () => {
            window.location.replace("Pre-registros"),
                $("#prer").css("cursor", "hand");
        }),
        $("#serv").on("click", () => {
            window.location.replace("Pre-Servicio");
        });
});