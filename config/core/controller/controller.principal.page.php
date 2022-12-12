<?php
require_once('../model/model.principal.page.php');
require_once('../libraries/getIPAdress.php');
require_once('../libraries/getDate.php');
$classDate = new DateClass;
$getIPAdress = new getAdress;
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$principalPageModel = new modelPrincipalPage;
if(isset($_REQUEST['request_blog'])){
    if($_REQUEST['request_blog'] == 'enviar_comentario'){
        if(isset($_POST['mensaje'])){
            echo $principalPageModel->sendCommentary($_POST['nombre'], $_POST['telefono'], $_POST['email'], $_POST['mensaje'], $getIPAdress->getRealIP(),   $classDate->getDate());
        }else{
            echo 'Error_Post_Sugerencia'.$_POST['nombre'];
        }
    }
}else{
    require_once("../error/error.page.php");
}