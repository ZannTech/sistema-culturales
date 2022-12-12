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
                var t = e.getContent();
                e.setContent(t);
            });
        },
        content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px } img{max-width: 100%; max-height:100%;}",
         plugins: "code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help",
            toolbar: "a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar_mode: "floating",
        tinycomments_mode: "embedded",
        language: "es",
        branding: !1,
    });
    var e = $("#id-notice").val();
    fetchdata(e),
        $("#post-new").on("submit", function(t) {
            t.preventDefault();
            let a = $("#i-title").val(),
                o = $("#i-body").val();
            if ("" != $("#i-importancia").val() && "" != o && "" != a) {
                var n = new FormData($("#post-new")[0]);
                $.ajax({
                    url: "../../config/core/controller/controller.global.page.php?edit=" + e,
                    data: n,
                    method: "POST",
                    cache: !1,
                    proccessData: !1,
                    processData: !1,
                    contentType: !1,
                    success(e) {
                        $("#loader").hide();
                        1 == (e = e.trim()) ?
                            Swal.fire(
                                "Noticia modificada",
                                "Se han guardado los cambios correctamente",
                                "success"
                            ).then(function() {
                                window.location.replace("ManagePosts");
                            }) :
                            (console.log(e),
                                Swal.fire("error", "contacta al programador", "error"));
                    },
                    beforeSend() {
                        $("#loader").show();
                    },
                });
            } else Swal.fire("Llena todos los campos", "Se necesita que llenes todos los campos", "warning");
        });
});
var fetchdata = function(e) {
        $.ajax({
            url: "../../config/core/controller/controller.global.page.php?manage=fetch-id",
            data: "id=" + e,
            method: "POST",
            cache: !1,
            success: function(e) {
                if (e == "0") {
                    window.location.replace("ManagePosts");
                }
                let temporal;
                let t = {};
                let array = JSON.parse(e);
                array.forEach((e) => {
                        t = {
                            TITULO: e.TITULO,
                            CUERPO: e.DESCRIPCION,
                            SECCION: e.SECCION,
                            FECHA: e.FECHA,
                        };
                    }),
                    (temporal = `${t.CUERPO}`);
                $("#i-title").val(t.TITULO),
                    $("#i-fecha").val(t.FECHA),
                    $("#i-body").val(temporal),
                    $("#i-importancia").val(t.SECCION);
                $("#loader").hide();
            },
            beforeSend: function() {
                $("#loader").show();
            },
        });
    },
    update = function(e, t, a, o) {};