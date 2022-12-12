$(document).ready(function() {
    tinymce.init({
            selector: "#i-body",
            height: 1e3,
            force_br_newlines: !0,
            force_p_newlines: !1,
            forced_root_block: "",
            mode: "specific_textareas",
            editor_selector: "prepend_editor",
            setup: function(e) {
                e.on("init", function() {
                    var a = e.getContent();
                    e.setContent(a);
                });
            },
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px } img{max-width: 100%; max-height:100%;}",
            plugins: "code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help",
            toolbar: "a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar_mode: "floating",
            tinycomments_mode: "embedded",
            language: "es",
            branding: !1,
        }),
        $("#post-new").on("submit", (e) => {
            e.preventDefault();
            let a = $("#i-title").val(),
                t = $("#i-importancia").val(),
                n = $("#i-body").val(),
                o = $("#i-author").val(),
                i = $("#i-fecha").val();
            if ("" != a)
                if ("" != t)
                    if ("" != n)
                        if ("" != o)
                            if ("" != i) {
                                var l = new FormData($("#post-new")[0]);
                                $.ajax({
                                    url: "../../config/core/controller/controller.global.page.php?cls-blog=publicar",
                                    data: l,
                                    cache: !1,
                                    type: "POST",
                                    processData: !1,
                                    contentType: !1,
                                    success: function(e) {
                                        $("#loader").hide();
                                        "imagen" == e &&
                                            Swal.fire(
                                                "Error al publicar",
                                                "Intenta con otra imagen o cambiale el nombre a tu imagen seleccionada",
                                                "error"
                                            ),
                                            "1" == e &&
                                            Swal.fire(
                                                "Noticia publicada",
                                                "Gracias por darle seguimiento a la página :)",
                                                "success"
                                            ).then(() => {
                                                window.location.reload();
                                            });
                                    },
                                    beforeSend: function(e) {
                                        $("#loader").show()
                                    }
                                });
                            } else
                                Swal.fire(
                                    "Campo incompleto",
                                    "Algo no está funcionando en el programa, por favor contactame",
                                    "warning"
                                );
            else
                Swal.fire(
                    "Campo incompleto",
                    "Alerta, por favor contactame si te dá este mensaje",
                    "warning"
                );
            else
                Swal.fire(
                    "Campo incompleto",
                    "El contenido está vacío, rellenalo correctamente",
                    "warning"
                );
            else
                Swal.fire(
                    "Campo incompleto",
                    "Selecciona la importancia de la noticia",
                    "warning"
                );
            else
                Swal.fire(
                    "Campo incompleto",
                    "El título está incompleto, rellenalo correctamente",
                    "warning"
                );
        });
});