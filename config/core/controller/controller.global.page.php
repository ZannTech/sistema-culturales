<?php
require_once('../model/model.global.page.php');
require_once('../model/model.notices.page.php');
require_once('../const/size.files.php');
require_once('../libraries/getDate.php');
require_once('../libraries/getIPAdress.php');
require_once('../model/model.evidencias.page.php');
$mdlEv = new model_evidencias;
$dateClass = new DateClass;
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$mdlGlobal = new DashboardGlobal;
$mdlNotices = new modelNoticesClass;
$ipObject = new getAdress;
session_start();
//------------------------CONTROLADOR DEL DASHBOARD----------------------------------------

//------------------------metodos para administrador--------------------------------
if (isset($_REQUEST)) {
    if (isset($_REQUEST['fetch-data'])) {
        switch ($_REQUEST['fetch-data']) {
            case 'pre':
                echo $mdlGlobal->fetchpreregistro();
                break;
            case 'servicio':
                echo $mdlGlobal->fetchEncargado();
                break;
            case 'alumnos':
                echo $mdlGlobal->fetch_students();
                break;
            case 'alumnos-filter':
                if($_POST['taller-filtrado']){
                    if($_SESSION['tipo-rol']!="Estudiante"){
                        $taller = $_POST['taller-filtrado'];
                        echo $mdlGlobal->filter_student_by_class($taller);
                    }else{
                        echo "Key invalid";
                    }
                }
                break;
            case 'docente':
                if($_SESSION['tipo-rol']=="Administrador"){
                    echo $mdlGlobal->fetchDocente();
                }else{
                    echo "Key invalid"; 
                }
            break;
            case 'comentarios':
                if($_SESSION['tipo-rol'] == "Administrador"){
                    echo $mdlGlobal->getComments();
                }
                break;
            case 'comentarios-by-id':
                if($_SESSION['tipo-rol'] == "Administrador"){
                   if(isset($_POST['id'])){
                        echo $mdlGlobal->get_comment_by_id($_POST['id']);
                   }
                }
                break;
            case 'asistencia-alumno-by-id':
                if($_SESSION['tipo-rol']=="Alumno"){
                    if(isset($_POST)){
                        echo $mdlGlobal->fetch_asistencia_alumno_by_id($_POST['id']);
                    }
                }
            break;
            case 'asistencia-encargado-by-id':
                if($_SESSION['tipo-rol']=="Encargado"){
                    if(isset($_POST)){
                        $id = $_POST['id'];
                        echo $mdlGlobal->fetch_asistencia_encargado_by_id($id);
                    }
                }
            break;

        }
    }
    if (isset($_REQUEST['cls-crud-servicio'])) {
        switch ($_REQUEST['cls-crud-servicio']) {
            case 'accept':
                if (isset($_POST)) {

                    $NoControl = $_POST['NoControl'];

                    $Contrasena = $_POST['Contraseña'];

                    $Nombre = $_POST['Nombre'];

                    $Curp = $_POST['Curp'];

                    $GradoGrupo = $_POST['GradoGrupo'];

                    $Taller = $_POST['Taller'];

                    $Genero = $_POST['Genero'];

                    $Fecha = $_POST['Fecha'];

                    $Domicilio = $_POST['Domicilio'];

                    $Telefono = $_POST['Telefono'];

                    $Email = $_POST['Email'];

                    switch ($Genero) {
                        case 'Masculino':
                            $rutaImagen = 'Public/Images/profile-photos/default-male.png';
                            break;
                        case 'Femenino':
                            $rutaImagen = 'Public/Images/profile-photos/default-female.png';
                            break;
                        default:
                            $rutaImagen = 'Public/Images/profile-photos/default.jpg';
                            break;
                    }
                    if ($mdlGlobal->existManager($NoControl) == false) {
                        echo $mdlGlobal->acceptManager($NoControl, $Contrasena, $Nombre, $Curp, $GradoGrupo, $Taller, $Genero, $Fecha, $Domicilio, $Telefono, $Email, $rutaImagen);
                        echo $mdlGlobal->demissManager($_POST['id']);
                    } else {
                        echo "r";
                        $mdlGlobal->demissManager($_POST['id']);
                    }
                    //echo $mdlGlobal->acceptManager($NoControl, $Contrasena, $Nombre, $Curp, $GradoGrupo, $Taller, $Genero, $Fecha, $Domicilio, $Telefono, $Email, $rutaImagen);
                    //echo $mdlGlobal->demissManager($_POST['id']);
                }
                break;

            case 'delete':
                if (isset($_POST['id']) && $_POST['route']) {
                    $id = $_POST['id'];
                    $route = htmlspecialchars($_POST['route']);
                    $i = strrpos($route, '/');
                    $route = substr($route, 0, $i + 1);
                    $route = "../" . $route;
                    if (is_dir($route)) {
                        deleteDir($route);
                        echo $mdlGlobal->demissManager($id);
                    } else {
                        echo $mdlGlobal->demissManager($id);
                    }
                }
                break;
            case 'fetch-servicio-by-id':
                if (isset($_POST['id'])) {
                    echo $mdlGlobal->fetch_manager_by_id($_POST['id']);
                } else {
                    echo "no";
                }
                break;
        }
    }
    if (isset($_REQUEST['cls-crud-pre'])) {
        switch ($_REQUEST['cls-crud-pre']) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    //echo $mdlGlobal->demissAlumno($id);
                    //echo $mdlGlobal->demissAlumno($_POST['id']);
                    $route = htmlspecialchars($_POST['route']);
                    $i = strrpos($route, '/');
                    $route = substr($route, 0, $i + 1);
                    $route = "../" . $route;
                    if (is_dir($route)) {
                        deleteDir($route);
                        echo $mdlGlobal->demissAlumno($id);
                    } else {
                        echo $mdlGlobal->demissAlumno($id);
                    }
                }
                break;
            case 'accept':
                if (isset($_POST)) {
                    $NoControl = $_POST['NoControl'];
                    $Contrasena = md5($_POST['Contraseña']);
                    $Nombre = $_POST['Nombre'];
                    $Curp = $_POST['Curp'];
                    $GradoGrupo = $_POST['GradoGrupo'];
                    $Taller = $_POST['Taller'];
                    $Genero = $_POST['Genero'];
                    $Fecha = $_POST['Fecha'];
                    $Domicilio = $_POST['Domicilio'];
                    $Telefono = $_POST['Telefono'];
                    $Email = $_POST['Email'];
                    switch ($Genero) {
                        case 'Masculino':
                            $rutaImagen = 'Public/Images/profile-photos/default-male.png';
                            break;
                        case 'Femenino':
                            $rutaImagen = 'Public/Images/profile-photos/default-female.png';
                            break;
                        default:
                            $rutaImagen = 'Public/Images/profile-photos/default.jpg';
                            break;
                    }
                    if ($mdlGlobal->existStudent($NoControl) == false) {
                        echo $mdlGlobal->acceptStudent($NoControl, $Contrasena, $Nombre, $Curp, $GradoGrupo, $Taller, $Genero, $Fecha, $Domicilio, $Telefono, $Email, $rutaImagen);
                        echo $mdlGlobal->demissAlumno($_POST['id']);
                    } else {
                        echo "r";
                        $mdlGlobal->demissManager($_POST['id']);
                    }
                }
                break;
            case 'fetch-pre-by-id':
                if (isset($_POST)) {
                    echo $mdlGlobal->fetchpre_with_id($_POST['id']);
                } else {
                    echo "error";
                }
                break;
        }
    }
    if (isset($_REQUEST['cls-blog'])) {
        switch ($_REQUEST['cls-blog']) {
            case 'publicar':
                if (isset($_POST)) {
                    $res = $mdlNotices->publish_post($_POST['i-importancia'], $_POST['i-title'], $_POST['i-body'], date('Y-m-d H:i:s'), $_POST['i-author'], $ipObject->getRealIP());
                    echo $res;
                }
                //echo $mdlNotices->publish_post;
                break;
        }
    }
    if (isset($_REQUEST['dashboard'])) {
        if ($_SESSION['tipo-rol'] == "Administrador") {
            $data[] = array(
                'count_preregistros' => $mdlGlobal->rowCountPreregistros(),
                'count_servicio' => $mdlGlobal->rowCountServicio(),
                'count_comments' => $mdlGlobal->rowCountComments(),
                'count_alumno' => $mdlGlobal->rowCountAlumno(),
                'count_pre_mujer' => $mdlGlobal->filter_pre_by_genre('Femenino'),
                'count_pre_hombre' => $mdlGlobal->filter_pre_by_genre('Masculino'),
                'count_alumno_mujer' => $mdlGlobal->filter_by_genre('Femenino'),
                'count_alumno_hombre' => $mdlGlobal->filter_by_genre('Masculino'),
            );
            echo json_encode($data);
        } else {
            echo "Key de acceso no identificada, estos datos solo los puede saber el administrador, por favor contacta a soporte.";
        }
    }
    if (isset($_REQUEST['profile'])) {
        switch ($_REQUEST['profile']) {
            case 'edit':
                if (isset($_SESSION)) {
                    switch ($_SESSION['tipo-rol']) {
                        case 'Administrador':
                            $id = $_SESSION['id'];
                            $pass = md5($_POST['password']);
                            if ($_SESSION['md5'] == $pass) {
                                echo "contraseñas iguales";
                            } else {
                                echo $mdlGlobal->updateAdmin($id, $_POST['user'], md5($_POST['password']));
                                session_destroy();
                            }
                            break;
                        case 'Encargado':
                            $id = $_SESSION['id'];
                            $pass = md5($_POST['password']);
                            if ($_SESSION['md5'] == $pass) {
                                echo "contraseñas iguales";
                            } else {
                                echo $mdlGlobal->updateEncargado($id, md5($_POST['password']));
                                session_destroy();
                                //echo $_SESSION['md5'];


                            }
                            break;
                        case 'Alumno':
                            $id = $_SESSION['id'];
                            $pass = md5($_POST['password']);
                            if ($_SESSION['md5'] == $pass) {
                                echo "contraseñas iguales";
                            } else {
                                echo $mdlGlobal->updateAlumno($id, $pass);
                                session_destroy();
                            }

                            break;
                    }
                }
                break;
        }
    }
    if(isset($_REQUEST['crud-data'])){
        switch ($_REQUEST['crud-data']){
            case 'dar-baja-encargado':
                if($_SESSION['tipo-rol']== "Administrador"){
                    if(isset($_POST['id'])){
                        $id = $_POST['id'];
                        $rcw = $mdlGlobal->getCountasisencargado($id);
                        $rve = $mdlGlobal->countevidencies($id);
                        if($rcw == 0 && $rve == 0){
                            echo $mdlGlobal->dar_baja_encargado($id);
                        }else{
                            $res = 0;
                            $res1 = 0;
                            if($rcw > 0 ){
                                echo $res = $mdlGlobal->borrar_asistencias_encargado($id);
                            }
                            if($rve > 0){
                                 echo $res1 = $mdlGlobal->deleteevi($id);
                            }
                           
                                echo $mdlGlobal->dar_baja_encargado($id);
                          
                        }
                    }
                }
            break;
            case 'dar-baja-alumno':
                if($_SESSION['tipo-rol']== "Administrador"){
                    if(isset($_POST['id'])){
                        if(isset($_POST['id'])){
                            $id = $_POST['id'];
                            $rcw = $mdlGlobal->getCountAsisAlumno($id);
                            if($rcw == 0){
                                 $mdlGlobal->dar_baja_alumno($id);
                            }else{
                                $res = $mdlGlobal->borrar_asistencias_alumno($id);
                                if($res == 1){
                                    echo $mdlGlobal->dar_baja_alumno($id);
                                }
                            }
                        }
                    }
                }
            break;
        }
    }
    if(isset($_REQUEST['get-hours'])){
        switch($_REQUEST['get-hours']){
           case 'servicio':
            if($_SESSION['tipo-rol'] == "Encargado"){
                if(isset($_POST['id'])){
                    echo  $mdlGlobal->gethoursencargado($_POST['id']);
                }
            }
            break;
            case 'alumno':
                if($_SESSION['tipo-rol'] == "Alumno"){
                    if(isset($_POST['id'])){
                        echo  $mdlGlobal->gethrsalumno($_POST['id']);
                    }
                }
            break;
        }
    }
    if(isset($_REQUEST['get-percents'])){
        if($_SESSION['tipo-rol']!=""){
           switch ($_REQUEST['get-percents']){
               case 'servicio':
                $tipo = $_POST['tipo'];
                $hrs = $_POST['hrs'];
                echo $mdlGlobal->setPercentage($tipo, $hrs);
                break;
                case 'alumno':
                    $tipo = $_POST['tipo'];
                    $hrs = $_POST['hrs'];
                    echo $mdlGlobal->setPercentage($tipo, $hrs);
                 break;
           }
        }
    }
    if(isset($_REQUEST['manage'])){
        switch($_REQUEST['manage']){
            case 'edit':
                if($_SESSION['tipo-rol']!="" && $_SESSION['tipo-rol']=="Administrador"){
                    if(isset($_POST)){
                    $id = $_POST['id'];
                    $section = $_POST['i-importancia'];
                    $titulo = $_POST['i-titulo'];
                    $cuerpo = $_POST['i-body'];
                    var_dump($_POST);
                    //echo $mdlNotices->editposts($id, $section, $titulo);
                    
                    }else{
                        echo "no hay datos";
                    }
                }else{
                    echo "KEY INVALID";
                }
            break;
            case 'delete':
                if($_SESSION['tipo-rol']!="" && $_SESSION['tipo-rol']=="Administrador"){
                    if(isset($_POST)){
                    $id = $_POST['id'];
                    echo $mdlNotices->deleteposts($id);
                    }
                }else{
                    echo "KEY INVALID";
                }
            break;
            case 'fetch':
                echo $mdlNotices->fetchreq();
                break;
                case 'fetch-id':
                    echo $mdlNotices->fetchbyid($_POST['id']);                    
                break;
        }
    }
    if(isset($_REQUEST['edit'])){
        if(isset($_POST)){
            $id= $_REQUEST['edit'];
            $section = $_POST['i-importancia'];
            $titulo = $_POST['i-title'];
            $cuerpo = $_POST['i-body'];
           echo $mdlNotices->editposts($id, $section, $titulo, $cuerpo);
           
            }else{
                echo "no hay datos";
            }
    }
    if(isset($_REQUEST['evidencia'])){
        switch($_REQUEST['evidencia']){
            case 'publicar':
                if($_SESSION['tipo-rol'] == "Encargado"){
                    if(isset($_POST)){
                        $fecha = date("Y-m-d H:i");
                        $id = $_SESSION['id'];
                        $cuerpo = $_POST['i-body'];
                        $nota = $_POST['i-note'];
                        $autor = $_POST['i-author'] .' del taller: '. $_SESSION['taller'];
                        
                        if($nota == ""){
                            $nota = "PENDIENTE  A REVISION";
                         }
                        echo $mdlEv->insertEvidence($fecha, $cuerpo, $nota, $id, $autor, "PENDIENTE");
                    }
                }
            break;
            case 'fetch':
                if($_SESSION['tipo-rol'] == "Administrador"){
                    echo $mdlEv->fetch_evidencia();
                }
            break;
            case 'fetch-e-b-id':
                $id = $_SESSION['id'];
                echo $mdlEv->get_evidencia_by_id($id);
                break;
            case 'fetch-ev-id':
                $id = $_POST['id'];
                echo $mdlEv->fetch_ev_uid($id);
                break;
            case 'accept':
                $id = $_POST['id'];
                $retro = $_POST['retro'];
                echo $mdlEv->set_status($id, "ACEPTADA", $retro);
            break;
            case 'deny':
                $id = $_POST['id'];
                $retro = $_POST['retro'];
                echo $mdlEv->set_status($id, "DENEGADA", $retro);
            break;
        }
    }
    
}
function deleteDir($ruta)
{
    foreach (glob($ruta . "/*") as $elemento) {
        if (is_dir($elemento)) {
            deleteDir($elemento);
        } else {
            unlink($elemento);
        }
    }
    rmdir($ruta);
}
function randFile($extension)
{
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // Output: video-g6swmAP8X5VG4jCi.mp4
    return 'image-' . substr(str_shuffle($permitted_chars), 0, 40) . '.' . $extension;
}
function check_valid_image_size($file)
{
    $allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp');

    if (!in_array($file['type'], $allowed_mimetypes)) {
        return $file;
    }

    $image = getimagesize($file['tmp_name']);

    $maximum = array(
        'width' => '1024',
        'height' => '768'
    );

    $image_width = $image[0];
    $image_height = $image[1];

    $too_large = "Image dimensions are too large. Maximum size is {$maximum['width']} by {$maximum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";

    if ($image_width > $maximum['width'] || $image_height > $maximum['height']) {
        //add in the field 'error' of the $file array the message
        $file['error'] = $too_large;
        return $file;
    } else {
        return $file;
    }
}
