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
require_once('templates/header.php');
?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Administración de registros</h1>
    </div>
    <div class="row">

        <div class="col-lg-12" width="100% !important;">
            <div class="card">

                <div class="card-body">
                    <button id="btn-update" class="btn btn-success">Actualizar <i class="fas fa-redo-alt"></i></button>
                    <div class="sp"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="pre-reg" class="mdl-data-table display " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Taller</th>
                                        <th>Grado</th>
                                        <th>No. Control</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="bs-data" role="document" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitud de ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="sp"></div>
            <div class="row no-gutters">
                <div class="col-lg-12 pl-3">
                    <p><img src="https://www.w3schools.com/bootstrap4/img_avatar3.png"  id="img-student" width="100px" height="100px" class="img-fluid"></p>
                    <p id="tx-noc"></p>
                    <p id="tx-curp"></p>
                    <p id="tx-gen"></p>
                    <p id="tx-nombre"></p>
                    <p id="tx-taller"></p>
                    <p id="tx-gr"></p>
                    <p id="tx-num"></p>
                    <p id="tx-fecha"></p>
                    <p id="tx-email"></p>
                    <p id="tx-dom"></p>
                    <a href="" target="_blank" id ="h-cer" class="btn btn-info">Certificado médico <i class="fas fa-share"></i></a>
                    <a href="" target="_blank" id="h-car" class="btn btn-info">Carta compromiso <i class="fas fa-share"></i></a>
                    <div class="sp"></div>
                    <hr class="sidebar-divider my-0">
                    <div class="sp"></div>
                    <div class="row" id = "section-btn">
                    <div class="col-lg-3">
                      <button class="delete btn btn-danger btn-block">No aceptar</button>
                     </div>
        ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ <div class="col-lg-5 col-md-offset-4">
                    <button class="view btn btn-success btn-block ">Aceptar</button>
                    </div>
                    </div>
                    <div class="sp"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('templates/footer.php');
?>
<script src="../../config/core/ajax.controller/ajax.controller.preregistros.js"></script>