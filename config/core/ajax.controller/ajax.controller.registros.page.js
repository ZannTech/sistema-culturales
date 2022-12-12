let h1 = $("#count"),
    segundos = 0,
    minutos = 10;

function actualizaCount() { $("#count").css("text-style", "bold"), 0 == segundos && (segundos = 60, minutos = --minutos), segundos = --segundos, 2 == minutos && $("#count").css("color", "red"), segundos < 10 && 0 != segundos ? $("#count").html(minutos + ":0" + segundos) : 60 == segundos ? $("#count").html(minutos + ":00") : $("#count").html(minutos + ":" + segundos) }

function Empty(e) { Swal.fire(e + " incompleto", "rellene todos sus datos", "warning") }
window.onload = function() {
    var e = document.getElementById("contenedor_carga");
    e.style.visibility = "hidden", e.style.opacity = "0"
}, $(document).ready(() => {
    Swal.fire("Bienvenido a la página de registros", "Tienes <b>10</b> minutos para completar el formulario<br>*TODOS LOS CAMPOS DEBEN ESTAR EN MINUSCULAS Y SIN ESPACIOS AL TERMINAR LOS CAMPOS*", "info").then(() => { Swal.fire("Tienes que tener todos los archivos listos, para no tardar mucho", "Respeta los campos requeridos, en caso de que haya un ataque malisioso de tu parte, tu <b>ip</b> será rastreada y se proporcionará a las autoridades", "warning").then(() => { Swal.fire("Tu ip es publica, asi que no te preocupes, solo protegemos tus datos personales de piratas informaticos", "<html>Cualquier duda, queja, o sujerencia, no dudes en mandarme un correo electronico <b>randellcode@outlook.es</b><br>&copy;RC Advance</html>").then(() => { setInterval(actualizaCount, 1e3) }) }) }), $("#frm-taller-cultural").on("submit", e => {
        e.preventDefault();
        var a = new FormData($("#frm-taller-cultural")[0]);
        if (params = { NoControl: $("#icontrol").val(), Nombre: $("#inombre").val(), Apellido_Paterno: $("#iap").val(), Apellido_Materno: $("#iam").val(), Curp: $("#icurp").val(), Grado: $("#igrado").val(), Grupo: $("#igrupo").val(), Taller: $("#italler").val(), Genero: $("#igen").val(), Fecha: $("#ifecha").val(), Pais: $("#country").val(), CodigoPostal: $("#postcode").val(), Calle: $("#icalle").val(), Numero_Casa: $("#inumcasa").val(), Colonia: $("#city").val(), Telefono: $("#itel").val(), Email: $("#iemail").val(), Deporte: $("#ideporte").val() }, "" != params.NoControl)
            if ("" != params.Nombre)
                if ("" != params.Apellido_Materno)
                    if ("" != params.Apellido_Paterno)
                        if ("" != params.Curp)
                            if ("" != params.Grado)
                                if ("" != params.Grado)
                                    if ("" != params.Taller)
                                        if ("" != params.Genero)
                                            if ("" != params.Fecha)
                                                if ("" != params.Pais)
                                                    if ("" != params.CodigoPostal)
                                                        if ("" != params.Calle)
                                                            if ("" != params.Numero_Casa)
                                                                if ("" != params.Colonia)
                                                                    if ("" != params.Telefono)
                                                                        if ("" != params.Email)
                                                                            if ("" != params.Email)
                                                                                if ("" != params.Deporte)
                                                                                    if (curpValida(params.Curp))
                                                                                        if (nombre_valido(params.Nombre) && nombre_valido(params.Apellido_Materno) && nombre_valido(params.Apellido_Paterno)) {
                                                                                            let e = new Date,
                                                                                                r = new Date($("#ifecha").val()),
                                                                                                o = e.getFullYear() - r.getFullYear();
                                                                                            o >= 14 && o <= 19 ? $.ajax({
                                                                                                url: "../../config/core/controller/controller.registros.page.php?register=registrar_alumno",
                                                                                                cache: !1,
                                                                                                type: "POST",
                                                                                                data: a,
                                                                                                processData: !1,
                                                                                                contentType: !1,
                                                                                                beforeSend: () => { $("#loader").show() },
                                                                                                success: e => {
                                                                                                    if ($("#loader").hide(), 1 == e) { Swal.fire("Registrado correctamente", "Has sido registrado correctamente, gracias por registrarte", "success").then(() => { window.location.replace("../../") }) }
                                                                                                    1 != e && Swal.fire("Alerta", "" + e, "warning")
                                                                                                },
                                                                                                error: e => { $("#loader").hide() }
                                                                                            }) : Swal.fire("Edad inválida", "¿De verdad tienes esa edad?", "warning")
                                                                                        } else Swal.fire("Apellidos y/o nombres inválidos", "Intente llenarlos correctamente", "warning");
        else Swal.fire("Curp invalida", "Intente llenar la curp correctamente", "warning");
        else Empty("Deporte");
        else Empty("Email");
        else Empty("Email");
        else Empty("Teléfono");
        else Empty("Colonia");
        else Empty("Número Int.");
        else Empty("Calle");
        else Empty("Código Postal");
        else Empty("País");
        else Empty("Fecha");
        else Empty("Género");
        else Empty("Taller");
        else Empty("Grupo");
        else Empty("Grado");
        else Empty("Curp");
        else Empty("Apellido Paterno");
        else Empty("Apellido Materno");
        else Empty("Nombre");
        else Empty("Número Control")
    }), $("#frm-servicio").on("submit", e => {
        if (e.preventDefault(), params = { NoControl: $("#icontrol").val(), "Contraseña": $("#icontraseña").val(), Nombre: $("#inombre").val(), Apellido_Paterno: $("#iap").val(), Apellido_Materno: $("#iam").val(), Curp: $("#icurp").val(), Grado: $("#igrado").val(), Grupo: $("#igrupo").val(), Taller: $("#italler").val(), Genero: $("#igen").val(), Fecha: $("#ifecha").val(), Pais: $("#country").val(), CodigoPostal: $("#postcode").val(), Calle: $("#icalle").val(), Numero_Casa: $("#inumcasa").val(), Colonia: $("#city").val(), Telefono: $("#itel").val(), Email: $("#iemail").val() }, "" != params.NoControl)
            if ("" != params.Nombre)
                if ("" != params.Apellido_Materno)
                    if ("" != params.Apellido_Paterno)
                        if ("" != params.Curp)
                            if ("" != params.Grado)
                                if ("" != params.Grado)
                                    if ("" != params.Taller)
                                        if ("" != params.Genero)
                                            if ("" != params.Fecha)
                                                if ("" != params.Pais)
                                                    if ("" != params.CodigoPostal)
                                                        if ("" != params.Calle)
                                                            if ("" != params.Numero_Casa)
                                                                if ("" != params.Colonia)
                                                                    if ("" != params.Telefono)
                                                                        if ("" != params.Email)
                                                                            if ("" != params.Email)
                                                                                if ("" != params.Email)
                                                                                    if (curpValida(params.Curp))
                                                                                        if (nombre_valido(params.Nombre) && nombre_valido(params.Apellido_Materno) && nombre_valido(params.Apellido_Paterno)) {
                                                                                            let e = new Date,
                                                                                                r = new Date($("#ifecha").val()),
                                                                                                o = e.getFullYear() - r.getFullYear();
                                                                                            if (o >= 14 && o <= 19) {
                                                                                                var a = new FormData($("#frm-servicio")[0]);
                                                                                                $.ajax({
                                                                                                    url: "../../config/core/controller/controller.registros.page.php?register=registrar_servicio",
                                                                                                    cache: !1,
                                                                                                    type: "POST",
                                                                                                    data: a,
                                                                                                    processData: !1,
                                                                                                    contentType: !1,
                                                                                                    beforeSend: () => { $("#loader").show() },
                                                                                                    success: e => {
                                                                                                        if ($("#loader").hide(), 1 == e) { Swal.fire("Registrado correctamente", "Has sido registrado correctamente, gracias por registrarte", "success").then(() => { window.location.replace("../../") }) }
                                                                                                        1 != e && Swal.fire("Alerta", "" + e, "warning")
                                                                                                    },
                                                                                                    error: e => { $("#loader").hide() }
                                                                                                })
                                                                                            } else Swal.fire("Edad inválida", "¿De verdad tienes esa edad?", "warning")
                                                                                        } else Swal.fire("Apellidos y/o nombres inválidos", "Intente llenarlos correctamente", "warning");
        else Swal.fire("Curp invalida", "Intente llenar la curp correctamente", "warning");
        else Empty("Email");
        else Empty("Email");
        else Empty("Email");
        else Empty("Teléfono");
        else Empty("Colonia");
        else Empty("Número Int.");
        else Empty("Calle");
        else Empty("Código Postal");
        else Empty("País");
        else Empty("Fecha");
        else Empty("Género");
        else Empty("Taller");
        else Empty("Grupo");
        else Empty("Grado");
        else Empty("Curp");
        else Empty("Apellido Paterno");
        else Empty("Apellido Materno");
        else Empty("Nombre");
        else Empty("Número Control")
    })
});
const alerta = (e, a, r) => {
    switch (e) {
        case "error":
            Swal.fire(a, r, "error");
            break;
        case "success":
        case "warning":
        case "info":
            Swal.fire(a, r, "success");
            break;
        default:
            Swal.fire(a, r)
    }
};

function filename() {
    var e = self.location.href,
        a = e.lastIndexOf("/");
    return e.substring(a + "/".length, e.length)
}

function nombre_valido(e) { return !!/^([a-z ñáéíóú]{2,60})$/i.test(e) }

function curpValida(e) { var a = e.match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/); if (!a) return !1; return a[2] == function(e) { for (var a, r = 0, o = 0; o < 17; o++) r += "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ".indexOf(e.charAt(o)) * (18 - o); return 10 == (a = 10 - r % 10) ? 0 : a }(a[1]) }

function nssValido(e) {
    const a = e.match(/^(\d{2})(\d{2})(\d{2})\d{5}$/);
    if (!a) return !1;
    const r = parseInt(a[1], 10),
        o = (new Date).getFullYear() % 100;
    var l = parseInt(a[2], 10),
        i = parseInt(a[3], 10);
    return !(97 != r && (l <= o && (l += 100), i <= o && (i += 100), i > l)) && luhn(e)
}

function luhn(e) {
    for (var a = 0, r = !1, o = e.length - 1; o >= 0; o--) {
        var l = parseInt(e.charAt(o), 10);
        r && (l *= 2) > 9 && (l -= 9), r = !r, a += l
    }
    return a % 10 == 0
}