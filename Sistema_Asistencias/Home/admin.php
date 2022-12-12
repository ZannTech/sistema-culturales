<?php
session_start();
if($_SESSION['taller']!="ADMIN"){
    header("location: ../");
}
require_once('../../config/core/libraries/getDate.php');
$date = new DateClass;
require_once('../../config/core/const/days.php');
require_once('../../config/core/libraries/system.control.php');
require_once('../../config/core/controller/controller.sesions.method.php');
$sessionMethod = new methodsSessions;
$sessionMethod->verifyAdminAsistencia();
$day =  $date->getDate();
$day =  substr($day, 0, 7);
$validDay;
if($day == DIAS[6-1]){
    $validDay = true;
}else{
    require_once('../../config/core/error/error.page.php');
    $validDay = false;
    echo "<title> ERROR AL ACCEDER</title>";
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo "<script>Swal.fire({
        title: 'Error al acceder',
        text: 'No puedes acceder el día de hoy SOLO SÁBADOS',
        showCancelButton: false,
        allowEscapeKey : false,
        showConfirmButton: false,
        allowOutsideClick: false
         })</script>";
}
if($validDay == true){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto+Condensed:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/index.css">
    <script src="../../Assets/javascript/app.global.js"></script>
    <link rel="shortcut icon" href="../../Assets/images/cb.png">
    <title>Agregar asistenia</title>
</head>
<div id="loader">
		<div class="spinner">
			<div class="rect1"></div>
			<div class="rect2"></div>
			<div class="rect3"></div>
			<div class="rect4"></div>
			<div class="rect5"></div>
		</div>
</div>
<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="javascript:;">DIFUSION CULTURAL Y DEPORTIVO</a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-funnel color-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <h3><span class="badge badge-secondary bg-dark text-white mb-2">Día de hoy:
                                    <?php echo $date->getDate();?></span>
                        </li>
                        <li class="nav-item px-3">
                          <a class="nav-link text-gold" href="javascript:;" id="btn-log">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="row no-gutters justify-content-center">
        <div class="col-lg-10 col-xs-10 col-sm-10 col-md-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Agregar asistencia</h3>
                    <p class="card-text">Agrega asistencias para la fecha de: <?php echo $date->getDate();?></p>
                    <form method="post" id="insert-as">
                        <div class="form-group col-lg-12">
                            <label for="">Selecciona el taller</label>
                            <input type="text" name="taller" id="taller" class="form-control"
                                value="<?php if($_SESSION['taller']=="ADMIN"){
                                    echo "ACCESO GENERAL";    
                                }else{
                                    var_dump($_SESSION);
                                }
                                    ?>" disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <select id="encargado" class="form-control" name="encargado">
                                <!--Alumnos-->
                                <option>Seleccione un alumno</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="i-fecha-entrada">Ingresa la fecha de entrada:</label>
                            <input type="time" class="form-control" name="i-fecha-entrada" id="i-fecha-entrada" disabled
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Fecha de entrada</small>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="i-fecha-salida">Ingresa la fecha de salida:</label>
                            <input type="time" min="8:00" class="form-control" name="i-fecha-salida" id="i-fecha-salida"
                                disabled aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Fecha de salida</small>
                        </div>
                        <div class="form-group col-sm-3">
                            <select class="form-control" id="state" disabled name="estado">
                                <option value="">Selecciona un estado</option>
                                <option value="Asistio">Asistio</option>
                                <option value="No asistio">No asistio</option>
                            </select>
                        </div>
                        <button type="submit" id="btn_asistencia" disabled class="btn btn-primary btn-block">Registrar asistencia</button>
                        <div id="sep"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js" integrity="sha512-nOQuvD9nKirvxDdvQ9OMqe2dgapbPB7vYAMrzJihw5m+aNcf0dX53m6YxM4LgA9u8e9eg9QX+/+mPu8kCNpV2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <script src="../../config/core/ajax.controller/ajax.controller.asistencias.admin.js"></script>
</body> 
<script>
<?php
}
?>