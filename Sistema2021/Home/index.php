<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
require_once('templates/header.php');
if(isset($_SESSION)){
    $id = $_SESSION['id'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid" id="report">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <input type="hidden" id="session-id"value="<?php echo $_SESSION['id'];?>">
        <h1 class="h3 mb-0 text-gray-800">
            <?php
            $phrase = null;
            $date = date("H");
            if ($date < 6) {
                $phrase = "Buenos madrugadas";
            } else if ($date < 12 && $date > 6) {
                $phrase = "Buenos días";
            } else if ($date < 19) {
                $phrase = "Buenas tardes";
            } else {
                $phrase = "Buenas noches";
            }
            echo $phrase . ' ' . strtolower($_SESSION['user']) . ' ¡es bueno tenerte de vuelta!';
            ?>
        </h1>
        <a href="javascript:;" id="generate-report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generar reporte</a>
    </div>

    <?php
    if ($_SESSION['tipo-rol'] == "Administrador") {
    ?>
        <button id="update-data" class="btn btn-info">Actualizar</button>
        <div class="sp"></div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4" id="listas">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Alumnos registrados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="c-alumnos"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-double fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4" id="prer">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Pre-registros pendientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="c-pre"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-3 col-md-6 mb-4" id="serv">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Registros pendientes al servicio social</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="c-serv"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" id="go-to-comments">
                                    Comentarios de la página</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="c-com"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
      
    <?php } ?>


    <!-- Content Row -->
    <div class="row">
        <?php
        if ($_SESSION['tipo-rol'] != "Administrador") {


        ?>

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Avances</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">
                            <?php
                            if ($_SESSION['tipo-rol'] == "Encargado") {
                                echo "Servicio social";
                            } else {
                                echo "Taller cultural";
                            }
                            ?>
                            <span class="float-right" id="txt-p">0%</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="per" role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="col-lg-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bienvenido</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>¿Qué hay de nuevo?
                        Estamos muy agradecidos de tenerte de vuelta <b> <?php echo $_SESSION['user']; ?></b></p>
                </div>
            </div>
        </div>
        <?php 
        if($_SESSION['tipo-rol']=="Administrador"){
        ?>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Alumnos</h6>
                </div>
                <canvas id="myChart" width="auto" height="auto"></canvas>
                <div class="sp"></div>
            </div>
            
        </div>
       
        <?php 
        }
        ?>
        <div class="col-lg-6">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Notas del desarrollador</h6>
                </div>
                <div class="card-body">
                    <p>Aún está en fase de prueba, por lo que te pido que si encuentras algún error, me llames a: <b>462-242-2815</b></p>
                    <p class="mb-0">Después de que hagas alguna operacion con el mismo, ya es de tu responsabilidad lo que pase con la base de datos, el sistema es muy seguro y a prueba de errores.</p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
require_once('templates/footer.php');
?>
<script src="../../config/core/ajax.controller/ajax.dashboard.page.js"></script>
<?php 
if($_SESSION['tipo-rol']!="Administrador"){
    if($_SESSION['tipo-rol']=="Encargado"){
        ?>  
        <script src="../../config/core/ajax.controller/ajax.controller.statistics.js"></script>
        <?php
    }else{
        ?>
        <script src="../../config/core/ajax.controller/ajax.controller.statistics.alumno.js"></script>
        <?php
    }
}
?>