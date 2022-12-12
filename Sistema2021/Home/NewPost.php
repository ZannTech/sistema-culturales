<?php
session_start();

require_once('../../config/core/controller/controller.sesions.method.php');
require_once('../../config/core/libraries/getDate.php');
$mtsession = new methodsSessions;
$classDate = new DateClass;
if ($mtsession->verifyAdmin() == 1) {
} else {
    header('location: ./');
}
if(isset($_REQUEST['m']) && isset($_REQUEST['id'])){
    if($_REQUEST['m']!="edit"){
        header('location: ./');
    }else{
        $id = $_REQUEST['id'];
        $rq = "Editar noticia";
    }
}else{
    $rq = "Publicar noticia";
}
require_once('templates/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $rq; ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   
                    <h5 class="card-title">Publicar</h5>
                    <form method="post" id="post-new" enctype="multipart/form-data">
                        <div class="col-lg-12">
                        <?php 
                    if(isset($_REQUEST['m'])){
                        ?>
                        <input type="hidden" value="<?php echo $id?>" name="id-notice" disabled id="id-notice">
                        <?php
                    }
                    ?>
                            <div class="form-group">
                                <label for="i-title">Titulo de la noticia</label>
                                <input id="i-title" class="form-control" type="text" name="i-title" maxlength="50" placeholder="Titulo de la noticia" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
                            </div>
                            <div class="form-group">
                                <label for="i-importancia">Importancia de la noticia</label>
                                <select id="i-importancia" class="form-control" name="i-importancia">
                                    <option>Importante</option>
                                    <option>De menor importancia</option>
                                    <option>Aviso</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="i-body">Cuerpo de la noticia</label>
                                <textarea id="i-body" class="form-control" name="i-body" scrolling="no" maxlength="10000" placeholder="Introduce el cuerpo de la noticia, (LINKS, VIDEOS, TEXTOS CON ESTILOS)" minlength="60"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="i-author">Autor</label>
                                <select id="i-author" class="form-control" name="i-author">
                                    <option><?php echo $_SESSION['user']; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="i-fecha">Fecha</label>
                                <input type="text" class="form-control" name="i-fecha" value="<?php echo $classDate->getDate(); ?>" disabled id="i-fecha" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Fecha de la publicación</small>
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
                    <?php 
                    if(isset($_REQUEST['m'])){
                        ?>
                        <script src="../../config/core/ajax.controller/ajax.controller.modified.js"></script>
                        <?php
                    }else{
                        ?>
                        <script src="../../config/core/ajax.controller/ajax.controller.blog.js"></script>
                        <?php
                    }
                    ?>
