$(document).ready(function() {
    initMCE();
    $("#post-new").on("submit", (e) => {
        e.preventDefault();
        let data = {};
        data = {
            "cuerpo": $("#i-body").val(),
            "autor": $("#i-author").val(),
        }
        if (data.cuerpo != "" && data.autor != "") {

            if (data.cuerpo.length > 50) {
                Swal.fire({
                    title: 'Seguro que quieres enviar todo lo escrito en tu evidenca?',
                    text: "Ya no podrás hacer cambios",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, enviarla!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var n = new FormData($("#post-new")[0]);
                        $.ajax({
                            url: '../../config/core/controller/controller.global.page.php?evidencia=publicar',
                            contentType: false,
                            processData: false,
                            cache: false,
                            data: n,
                            method: 'POST',
                            beforeSend: function() {
                                $("#loader").show()
                            },
                            success: (res) => {
                                $("#loader").hide()
                                console.log(res);
                                var resx = res.trim()
                                if (resx == 1) {
                                    Swal.fire("Se ha publicado la evidencia", "Gracías por publicar", "success").then(function() {
                                        window.location.replace('./');
                                    })
                                } else {
                                    Swal.fire("Error al enviar la evidencia", "Favor de recargar la página", "error");
                                }
                            }
                        })
                    }
                })
            } else {
                Swal.fire("Intenta poner más cosas", "Ten imaginación...", "warning");
            }
        } else {
            Swal.fire("Campos incompletos", "Rellena todos los campos correctamente", "warning");
        }

    })
})

var initMCE = function() {
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
        plugins: "print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help",
        toolbar: "a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar_mode: "floating",
        tinycomments_mode: "embedded",
        language: "es",
        branding: !1,
    });
}