$(document).ready(function() {
    var a = $("#pam").val();
    fetchRequest(a),
        $("#btn-update").on("click", function() {
            fetchRequest(a);
        });
});
var fetchRequest = function(a) {
        "alumno" == a
            ?
            $.ajax({
                url: "../../config/core/controller/controller.global.page.php?fetch-data=alumnos",
                method: "POST",
                success: (e) => {
                    $("#loader").hide();
                    var o = JSON.parse(e),
                        r = $("#tbldata").DataTable({
                            dom: "Bfrtip",
                            buttons: ["copy", "excel", "pdf"],
                            destroy: !0,
                            data: o,
                            columns: [
                                { data: "Nombre" },
                                { data: "Taller" },
                                { data: "GradoGrupo" },
                                { data: "Domicilio" },
                                { data: "Telefono" },
                                {
                                    defaultContent: "<button class='ver btn btn-danger' ><i class='fas fa-sort-down  fa-2x'></i></button>",
                                },
                            ],
                            columnDefs: [
                                { targets: ["_all"], className: "mdc-data-table__cell" },
                            ],
                            responsive: !0,
                            language: {
                                sProcessing: "Cargando... por favor espere",
                                sLengthMenu: "Ver    _MENU_   alumnos",
                                sZeroRecords: "No se ha encontrado ningún alumno",
                                sEmptyTable: "No se hán registrado alumnos aún :(",
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
                    obtener_data("#tbldata tbody", r, a);
                },
                beforeSend: () => {
                    $("#loader").show();
                },
            }) :
            "servicio" == a &&
            $.ajax({
                url: "../../config/core/controller/controller.global.page.php?fetch-data=docente",
                method: "POST",
                success: (e) => {
                    $("#loader").hide();
                    var o = JSON.parse(e),
                        r = $("#tbldata").DataTable({
                            dom: "Bfrtip",
                            buttons: ["copy", "excel", "pdf"],
                            destroy: !0,
                            data: o,
                            responsive: !0,
                            columns: [
                                { data: "Nombre" },
                                { data: "Taller" },
                                { data: "GradoGrupo" },
                                { data: "Domicilio" },
                                { data: "Telefono" },
                                {
                                    defaultContent: "<button class='ver btn btn-danger' ><i class='fas fa-sort-down  fa-2x'></i></button>",
                                },
                            ],
                            columnDefs: [
                                { targets: ["_all"], className: "mdc-data-table__cell" },
                            ],
                            language: {
                                sProcessing: "Cargando... por favor espere",
                                sLengthMenu: "Ver    _MENU_   alumnos",
                                sZeroRecords: "No se ha encontrado ningún alumno",
                                sEmptyTable: "No se hán registrado alumnos aún :(",
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
                    obtener_data("#tbldata tbody", r, a);
                },
                beforeSend: () => {
                    $("#loader").show();
                },
            });
    },
    obtener_data = function(a, e, o) {
        var r;
        $(a).on("click", "button.ver", function() {
            var a = (r = e.row($(this).parents("tr")).data()).id,
                t = r.Nombre;
            Swal.fire({
                title: "Estas seguro de eliminar del programa a " + t.toLowerCase() + "?",
                text: "No se puede revertir nada de esto, proceder?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, dar de baja!",
            }).then((e) => {
                e.isConfirmed &&
                    ("alumno" == o ?
                        $.ajax({
                            url: "../../config/core/controller/controller.global.page.php?crud-data=dar-baja-alumno",
                            data: "id=" + a,
                            method: "POST",
                            beforeSend: () => {},
                            success: (a) => {
                                1 == a &&
                                    Swal.fire(
                                        "Alumno dado de baja",
                                        "Se ha dado de baja a " + t.toLowerCase(),
                                        "success"
                                    ).then(() => {
                                        window.location.reload();
                                    });
                            },
                        }) :
                        "servicio" == o &&
                        $.ajax({
                            url: "../../config/core/controller/controller.global.page.php?crud-data=dar-baja-encargado",
                            data: "id=" + a,
                            method: "POST",
                            beforeSend: () => {},
                            success: (a) => {
                                console.log(a);
                                1 == a &&
                                    Swal.fire(
                                        "Alumno dado de baja",
                                        "Se ha dado de baja a " + t.toLowerCase(),
                                        "success"
                                    ).then(() => {
                                        window.location.reload();
                                    });
                            },
                        }));
            });
        });
    };