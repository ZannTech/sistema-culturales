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
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}else{
    header('location: ./');
}
require_once('templates/header.php');
?>
<style>
  .abs-center {
  display: flex;
  align-items: center;
  justify-content: center;

}

</style>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Comentarios</h1>
    </div>
    <input type="hidden" value="<?php echo $id;?>" id="c-id">
    <div class="row" id="container">   

    </div>
</div>

<?php
require_once('templates/footer.php');
?>
<script src="../../config/core/ajax.controller/ajax.controller.comentario-renderer.js"></script>


