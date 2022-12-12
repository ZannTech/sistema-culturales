function Empty(e) { Swal.fire(e + " incompleto", "rellene todos sus datos", "warning") }
$(document).ready(() => {
    tinymce.init({
        selector: "#mensaje",
        height: 400,
        force_br_newlines: !0,
        force_p_newlines: !1,
        content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px } img{max-width: 100%; max-height:100%;}",
         menubar: false,
        toolbar: "bold italic underline",
        language: "es"
    }), $("#frm-sendrequest").on("submit", e => {
        if (e.preventDefault(), params = { Nombre: $("#nombre").val(), Telefone: $("#telefono").val(), Email: $("#email").val(), Mensaje: $("#mensaje").val() }, "" != params.Nombre)
            if ("" != params.Telefone)
                if ("" != params.Email)
                    if ("" != params.Mensaje) {
                        let e = $("#frm-sendrequest").serialize();
                        $.ajax({
                            url: "config/core/controller/controller.principal.page.php?request_blog=enviar_comentario",
                            method: "POST",
                            data: e,
                            beforeSend: () => { $("#loader").show() },
                            success: e => {
                                console.log(e);
                                if ($("#loader").hide(), null != e) {
                                    if (1 == e) Swal.fire({ title: "Comentario enviado", confirmButtonText: "Aceptar", allowEscapeKey: !1, allowOutsideClick: !1, icon: "success" }).then(() => { location.reload() });
                                    1 != e && alerta("error", "Error al enviar el comentario", "Recarga la página o intenta más tarde")
                                } else alerta("error", "Error en la consulta", "Recargue la página")
                            },
                            error: () => { $("#loader").hide(), alerta("error", "Error en la consulta", "Recargue la página") }
                        })
                    } else Empty("Mensaje");
        else Empty("Email");
        else Empty("Telefono");
        else Empty("Nombre")
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