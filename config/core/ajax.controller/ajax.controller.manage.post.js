$(document).ready(function() {
    fetchRequest(),
        $("#btn-update").on("click", function() {
            fetchRequest();
        });
});
var fetchRequest = function() {
        $.ajax({
            url: "../../config/core/controller/controller.global.page.php?manage=fetch",
            method: "POST",
            success: (a) => {
                $("#loader").hide();
                var e = JSON.parse(a),
                    t = $("#tbldata").DataTable({
                        destroy: !0,
                        scrollX: !0,
                        data: e,
                        columns: [
                            { data: "TITULO" },
                            { data: "FECHA" },
                            { data: "SECCION" },
                            { data: "PUBLICADOR" },
                            {
                                defaultContent: "<button class='ver btn btn-primary'>Editar</button>ㅤㅤ<button class='delete btn btn-danger'>Eliminar</button>",
                            },
                        ],
                        columnDefs: [
                            { targets: ["_all"], className: "mdc-data-table__cell" },
                        ],
                        language: {
                            sProcessing: "Cargando... por favor espere",
                            sLengthMenu: "Ver    _MENU_   noticias",
                            sZeroRecords: "No se ha encontrado ninguna noticia",
                            sEmptyTable: "No se hán pulicado noticias aún :(",
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
    },
    obtener_data = function(a, e) {
        var t, o;
        $(a).on("click", "button.ver", function() {
                (o = e.row($(this).parents("tr")).data()),
                window.location.replace("NewPost?m=edit&id=" + o.ID_NOTICIA);
            }),
            $(a).on("click", "button.delete", function() {
                (o = e.row($(this).parents("tr")).data()),
                (t = o.ID_NOTICIA),
                Swal.fire({
                    title: "Estás segur@ de eliminar esta noticia",
                    text: "Ya no podrás revertir cambios.",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrarla",
                }).then((a) => {
                    a.isConfirmed &&
                        $.ajax({
                            url: "../../config/core/controller/controller.global.page.php?manage=delete",
                            data: "id=" + t,
                            method: "POST",
                            success: (a) => {
                                $("#loader").hide();
                                1 == (a = a.trim()) ?
                                    Swal.fire(
                                        "Noticia eliminada",
                                        "Se ha eliminado la noticia",
                                        "success"
                                    ).then(() => {
                                        window.location.reload();
                                    }) :
                                    (console.log(a),
                                        Swal.fire("error", "contacta al programador", "error"));
                            },
                            beforeSend: () => {
                                $("#loader").show();
                            }
                        });
                });
            });
    };