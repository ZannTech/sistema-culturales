<?php
    require_once('../model/model.asistencias.php');
    require_once('../libraries/system.control.php');
    session_start();
    date_default_timezone_set('UTC');
    $system = new SystemControl;
    $mdlAsistencia = new modelAsistencias;
    if(isset($_REQUEST['asistencias'])){
        switch($_REQUEST['asistencias']){
            case 'rq-fetch-alumno': 
                $res = $mdlAsistencia->fetchAlumno($_SESSION['taller']);
                echo $res;
            break;
            case 'rq-fetch-manager':
                $res = $mdlAsistencia->fetchEncargado();
                echo $res;
                break;
            case 'logout':
                unset($_SESSION['id-session-as']);
                unset($_SESSION['taller']);
                echo "success";
                break;
        }
    }else{
        if(isset($_REQUEST)){
            if(isset($_REQUEST['exist-asistencia'])){
                $idAlumno = trim($_REQUEST['exist-asistencia']);
                $res = $mdlAsistencia->existAsistencia($idAlumno, date("Y-m-d"));
                echo trim($res);
            }
            if(isset($_REQUEST['exist-asistencia-docente'])){
                $idAlumno = trim($_POST['id']);
                $res = $mdlAsistencia->existAsistenciaEncargado($idAlumno, date("Y-m-d"));
                echo trim($res);
            }
            if(isset($_REQUEST['insert-asistencia'])){
                sleep(0.5);
                $idAlumno = trim($_REQUEST['insert-asistencia']);
                if($_POST){
                    $State = $_POST['estado'];
                    $Fecha = date("Y-m-d");  
                    $HrEntrada = $_POST['i-fecha-entrada'];
                    $HrSalida = $_POST['i-fecha-salida'];
                    $Hrs = $_POST['hrs'];
                    $syt = strpos($Hrs, ':');
                    $min = substr($Hrs, $syt + 1, 2);
                    $mins = ($min/60);
                    $Hr = substr($Hrs, 0,2);
                    if($State == "No asistio"){
                        $horasTotales = 0.00;
                    }else{
                        $horasTotales = $Hr + $mins;
                    }
                    //echo $horasTotales;
                    $result = $mdlAsistencia->insertAsistenciaAlumno($State, $Fecha, $HrEntrada.':00', $HrSalida.':00', $horasTotales, $idAlumno);
                    echo $result;
                }else{
                    echo 'error';
                }
            }
            if(isset($_REQUEST['insert-asistencia-docente'])){
                sleep(0.5);
                $idAlumno = trim($_POST['id']);
                if($_POST){
                    $State = $_POST['estado'];
                    $Fecha = date("Y-m-d");  
                    $HrEntrada = $_POST['i-fecha-entrada'];
                    $HrSalida = $_POST['i-fecha-salida'];
                    $Hrs = $_POST['hrs'];
                    $syt = strpos($Hrs, ':');
                    $min = substr($Hrs, $syt + 1, 2);
                    $mins = ($min/60);
                    $Hr = substr($Hrs, 0,2);
                    if($State == "No asistio"){
                        $horasTotales = 0.00;
                    }else{
                        $horasTotales = $Hr + $mins;
                    }
                    //echo $horasTotales;
                    $result = $mdlAsistencia->insertAsistenciaEncargados($State, $Fecha, $HrEntrada.':00', $HrSalida.':00', $horasTotales, $idAlumno);
                    echo $result;
                }else{
                    echo 'error';
                }
            }
        }
    }
        