$(document).ready(function() {
    var id = $("#id").val();
    fetchRequest();
    $("#btn-update").on("click", function() {
        fetchRequest()
    })
})
var fetchRequest = function() {
    $.ajax({
        url: "../../config/core/controller/controller.global.page.php?evidencia=fetch-e-b-id",
        method: "POST",
        success: (a) => {
            console.log(a)
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
                        {
                            defaultContent: "<button class='ver btn btn-primary'>VER</button>",
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
};