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
        <h1 class="h3 mb-0 text-gray-800">Comentarios</h1>
        <small>Leer comentarios de la página</small>
    </div>
    <div class="row">
        <div class="col-lg-12" width="100% !important;">
            <div class="card">
                <input type="hidden" id="pam" value="<?php echo $pam; ?>">
                <div class="card-body">
                    <button id="btn-update" class="btn btn-success">Actualizar <i class="fas fa-redo-alt"></i></button>
                    <div class="sp"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tbldata" class="mdl-data-table display " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>IP</th>
                                        <th>Fecha</th>
                                        <th></th>
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

<?php
require_once('templates/footer.php');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/datatables.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/zf/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/datatables.js"></script>
 <script type="text/javascript" src="../../config/core/ajax.controller/ajax.controller.comentarios.js"></script>