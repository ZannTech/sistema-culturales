function swalError(e, o) {
    Swal.fire(e, o, "error");
}

function sweetAlert() {
    (async() => {
        const { value: e } = await Swal.fire({
            title: "Recuperar contraseña",
            html: ' \n            <input id="curp" class="swal2-input" placeholder="Ingrese el curp"> \n                <input id="nocontrol" class="swal2-input" placeholder="Ingrese el numero de control">\n                <select id="type" value="" class="swal2-input">\n                <option selected>Seleccione el tipo de usuario</option>\n                <option value="alumno">Alumno</option>\n                <option value="encargado">Encargado</option>\n                </select>\n                <input id="key" class="swal2-input" placeholder="Key [Deje vacío si es un usuario tipo alumno]">\n                ',
            focusConfirm: !1,
            preConfirm: () => [
                document.getElementById("curp").value,
                document.getElementById("nocontrol").value,
                document.getElementById("type").value,
                document.getElementById("key").value,
            ],
        });
        if (e) {
            let o = { curp: e[0], nocontrol: e[1], tipo: e[2], key: e[3] };
            curpValida(o.curp) ?
                "" != o.nocontrol && "" != o.tipo ?
                $.ajax({
                    method: "POST",
                    url: "../config/core/controller/controller.login.page.php?user_activity=forgot-password",
                    data: "curp=" +
                        o.curp +
                        "&nocontrol=" +
                        o.nocontrol +
                        "&tipo=" +
                        o.tipo +
                        "&key=" +
                        o.key,
                    beforeSend: () => {
                        $("#loader").show();
                    },
                    success: (e) => {
                        switch (e.trim()) {
                            case "0":
                                swalError(
                                    "Usuario no encontrado",
                                    "Ingrese los datos correctos"
                                );
                                break;
                            case "-111":
                                swalError(
                                    "Llave de restauración invalida",
                                    "Ingrese la llave de restauración que se te proporciono en el manual"
                                );
                                break;
                            default:
                                let r = parseInt(e);
                                if (Number.isInteger(r)) {
                                    let e = { id: r, tipo: o.tipo };
                                    restore(e.id, e.tipo);
                                } else
                                    swalError("error desconocido", "consulta al programador"),
                                    console.log(e);
                        }
                        $("#loader").hide();
                    },
                }) :
                Swal.fire(
                    "Campos incompletos",
                    "Los campos no se han llenado correctamente, llenalos bien",
                    "alert"
                ) :
                Swal.fire("Error", "Curp invalida", "error");
        }
    })();
}

function curpValida(e) {
    var o = e.match(
        /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/
    );
    if (!o) return !1;
    return (
        o[2] ==
        (function(e) {
            for (var o, r = 0, a = 0; a < 17; a++)
                r +=
                "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ".indexOf(e.charAt(a)) *
                (18 - a);
            return 10 == (o = 10 - (r % 10)) ? 0 : o;
        })(o[1])
    );
}
async function restore(e, o) {
    const { value: r } = await Swal.fire({
        title: "Recuperar contraseña",
        html: ' \n            <input id="contrasena" class="swal2-input" placeholder="Ingrese la nueva contraseña"> \n            <input id="pwdconfirm" class="swal2-input" placeholder="Confirme la contraseña">\n            ',
        focusConfirm: !1,
        preConfirm: () => [
            document.getElementById("contrasena").value,
            document.getElementById("pwdconfirm").value,
        ],
    });
    if (r) {
        let a = { pwd: r[0], confirm: r[1] };
        a.pwd == a.confirm &&
            $.ajax({
                url: "../config/core/controller/controller.login.page.php?user_activity=restore",
                data: "id=" + e + "&pwd=" + a.pwd + "&type=" + o,
                cache: !1,
                method: "POST",
                success(e) {
                    1 == e ?
                        Swal.fire(
                            "Se ha cambiado la contraseña",
                            "Intenta acceder de nuevo",
                            "success"
                        ) :
                        "c-4" == e.trim() ?
                        swalError(
                            "Contraseña no admitida",
                            "Tiene que tener 4 o más carácteres"
                        ) :
                        (swalError("error desconocido", "consulta al programador"),
                            console.log(e));
                },
                beforeSend: function(e) {},
            });
    }
}
$(document).ready(() => {
    var link  = '<a href="mailto:randellcode@outlook.es?Subject=Sugerencia%20de%20la%20p&aacute;gina%20ODCS" target="_blank" rel="noopener">randellcode@outlook.es</a>';
    Swal.fire("Bienvenido al sistema!", "Puedes iniciar sesión siempre y cuando ya se te hayan proporcionado alguna credencial de acceso!", "info").then(()=>{
        Swal.fire("Aún estamos trabajando","Si ves que tienes algún problema en los inicios de sesión, mandame un correo a: " + link ,"info");
    })
    $("#forgot").on("click", () => {
            sweetAlert();
        }),
        $("#login-form").on("submit", (e) => {
            e.preventDefault();
            let o = {};
            Swal.fire({
                title: "Que tipo de usuario eres?",
                showDenyButton: !0,
                showCancelButton: !0,
                confirmButtonText: "Alumno",
                denyButtonText: "Docente",
                cancelButtonText: "Encargado",
            }).then((e) => {
                if (
                    "" !=
                    (o = e.isConfirmed ?
                        {
                            Usuario: $("#email").val(),
                            Password: $("#email").val(),
                            TipoUsuario: "Alumno",
                        } :
                        e.isDenied ?
                        {
                            Usuario: $("#email").val(),
                            Password: $("#email").val(),
                            TipoUsuario: "Docente",
                        } :
                        {
                            Usuario: $("#email").val(),
                            Password: $("#email").val(),
                            TipoUsuario: "Encargado",
                        }).Usuario
                )
                    if ("" != o.Password)
                        if ("" != o.TipoUsuario) {
                            let e = $("#login-form").serialize();
                            $.ajax({
                                method: "POST",
                                url: "../config/core/controller/controller.login.page.php?user_activity=" +
                                    o.TipoUsuario,
                                data: e,
                                beforeSend: () => {
                                    $("#loader").show();
                                },
                                success: (e) => {
                                    if (($("#loader").hide(), console.log(''), 1 == e)) {
                                        Swal.fire({
                                            title: "Bienvenido al sistema",
                                            allowEscapeKey: !1,
                                            allowOutsideClick: !1,
                                            icon: "success",
                                            confirmButtonText: "Entrar",
                                        }).then(() => {
                                            Swal.fire({
                                                    title: "Redirigiendo...",
                                                    html: "Cargando el administrador...<br><b>Por favor espere...</b>",
                                                    timer: 1500,
                                                    showCancelButton: false,
                                                    allowEscapeKey: false,
                                                    showConfirmButton: false,
                                                    allowOutsideClick: false
                                                }),
                                                setTimeout(() => {
                                                    window.location.replace("Home/");
                                                }, 1500);
                                        });
                                    } else
                                        1 != e &&
                                        (0 == e ?
                                            Swal.fire({
                                                title: "Credenciales no válidas",
                                                allowEscapeKey: !1,
                                                allowOutsideClick: !1,
                                                icon: "error",
                                            }) :
                                            Swal.fire({
                                                title: "Error al iniciar sesión, recarga la página o intenta más tarde",
                                                html: '<img src="https://www.freeiconspng.com/thumbs/reload-icon/arrow-refresh-reload-icon-29.png">',
                                                allowEscapeKey: !1,
                                                allowOutsideClick: !1,
                                            }));
                                },
                            });
                        } else
                            swalError("Rol vacío", "Intenta seleccionar un tipo de usuario");
                else swalError("Campo vacío", "Introduce una contraseña");
                else swalError("Campo vacío", "Rellena el campo de email");
            });
        });
});