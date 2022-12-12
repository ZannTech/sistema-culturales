<?php
session_start();

require_once('../../config/core/controller/controller.sesions.method.php');
require_once('../../config/core/libraries/getDate.php');
$mtsession = new methodsSessions;
$classDate = new DateClass;
if ($mtsession->verifyEncargado()==1) {
} else {
    header('location: ./');
}

require_once('templates/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PUBLICAR EVIDENCIA</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   
                    <h5 class="card-title">Publicar</h5>
                    <form method="post" id="post-new" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="i-title">FECHA DE PUBLICACIÓN</label>
                                <input type="text" class="form-control" name="i-fecha" value="<?php echo $classDate->getDate(); ?>" disabled id="i-fecha" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="i-body">EXPLICA QUE HICIERON (PUEDES PONER FOTOGRAFÍAS SI ES NECESARIO)</label>
                                <textarea id="i-body" class="form-control" name="i-body" scrolling="no" maxlength="100000" placeholder="¿Qué hiciste hoy?" minlength="60"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="i-author">PUBLICADO POR</label>
                                <select id="i-author" class="form-control" name="i-author">
                                    <option><?php echo strtoupper($_SESSION['user']); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="i-note">OBSERVACIONES</label>
                                <textarea id="i-note" class="form-control" name="i-note" scrolling="no" maxlength="500" placeholder="Notas u observaciones que tienes" minlength="60"></textarea>
                            </div>
                            <div class="col-lg-6  float-right"> <button type="submit" class="btn btn-success btn-block">Publicar</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
require_once('templates/footer.php');
?>
<script src="https://cdn.tiny.cloud/1/0r0q9q5n6mu7xqs9vfzxq4t5czq9tq12i6w5t1wbz15g83vm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../../config/core/ajax.controller/ajax.controller.evidencias.sender.js"></script>