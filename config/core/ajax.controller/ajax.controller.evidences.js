$(document).ready(function() {
    var id = $("#id").val();
    fetchRequest();
    $("#btn-update").on("click", function() {
        fetchRequest()
    })
})
var fetchRequest = function() {
    $.ajax({
        url: "../../config/core/controller/controller.global.page.php?evidencia=fetch",
        method: "POST",
        success: (a) => {

            $("#loader").hide();
            var e = JSON.parse(a),
                t = $("#tbldata").DataTable({
                    destroy: !0,
                    scrollX: !0,
                    data: e,
                    columns: [
                        { data: "status" },
                        { data: "fecha" },
                        { data: "nota" },
                        { data: "publicador" },
                        {
                            defaultContent: "<button class='ver btn btn-primary'>VER</button> <button class='accept btn btn-primary'>ACEPTAR</button> <button class='deny btn btn-primary'>DENEGAR</button> ",
                        },
                    ],
                    columnDefs: [
                        { targets: ["_all"], className: "mdc-data-table__cell" },
                    ],
                    language: {
                        sProcessing: "Cargando... por favor espere",
                        sLengthMenu: "Ver    _MENU_   evidencias",
                        sZeroRecords: "No se ha encontrado ninguna evidencia",
                        sEmptyTable: "No se hán pulicado evidencias aún :(",
                        sInfo: "_START_ - _END_  de _TOTAL_ ",
                        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "",
                        sInfoPostFix: "",
                        sSearch: "Buscar:",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: ">",
                            sPrevious: "<",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: { copy: "Copiar", colvis: "Visibilidad" },
                    },
                });
            obtener_data("#tbldata tbody", t);
        },
        beforeSend: () => {
            $("#loader").show();
        },
    });
}
obtener_data = function(a, e) {
    var t, o;
    $(a).on("click", "button.ver", function() {
        (o = e.row($(this).parents("tr")).data())
        window.location.replace("View?ev=" + o.id)
    })
    $(a).on("click", "button.accept", function() {
        (o = e.row($(this).parents("tr")).data())
        setstatus(o.id, 1);
    })
    $(a).on("click", "button.deny", function() {
        (o = e.row($(this).parents("tr")).data())
        setstatus(o.id, 2);
    })
};
var setstatus = (id, status) => {
    var retroalimentacion = "";
    Swal.fire({
        title: 'Ingresa la retroalimentación',
        input: 'textarea',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Look up',
        showLoaderOnConfirm: true,
        preConfirm: (retro) => {
            return `${retro}`;
        }
    }).then((result) => {

        if (result.isConfirmed) {
            retroalimentacion = result.value;
            if (retroalimentacion != "") {
                switch (status) {
                    case 1:
                        $.ajax({
                            url: "../../config/core/controller/controller.global.page.php?evidencia=accept",
                            data: 'id=' + id + '&retro=' + retroalimentacion,
                            method: "POST",
                            success: (a) => {
                                $("#loader").hide();
                                a = a.trim();
                                console.log(a)
                                if (a == 1) {
                                    Swal.fire("Se ha enviado la retroalimentación", "Se ha enviado la retroalimentación de esta evidencia", "success").then(() => {
                                        window.location.reload();
                                    })
                                } else {
                                    Swal.fire("Error", "Contacta al programador", "error")
                                }
                            },
                            beforeSend: () => {
                                $("#loader").show();
                            },
                        });
                        break;
                    case 2:
                        $.ajax({
                            url: "../../config/core/controller/controller.global.page.php?evidencia=deny",
                            data: 'id=' + id + '&retro=' + retroalimentacion,
                            method: "POST",
                            success: (a) => {
                                $("#loader").hide();
                                a = a.trim();
                                if (a == 1) {
                                    Swal.fire("Se ha enviado la retroalimentación", "Se ha enviado la retroalimentación de esta evidencia", "success").then(() => {
                                        window.location.reload();
                                    })
                                } else {
                                    Swal.fire("Error", "Contacta al programador", "error")
                                }
                            },
                            beforeSend: () => {
                                $("#loader").show();
                            },
                        });
                        break;
                }
            }
        }
    })


}