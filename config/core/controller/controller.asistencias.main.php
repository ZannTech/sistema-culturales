<?php
    require_once('../model/model.asistencias.php');
    $objModelAsistencia = new modelAsistencias;
    if(isset($_REQUEST)){
        session_start();
        switch ($_REQUEST['login']){
            
            case 'admin':
                if(isset($_POST['email'])&&isset($_POST['password'])){
                    $rwc = $objModelAsistencia->loginAdmin($_POST['email'], md5($_POST['password']));
                    if($rwc == 1){
                        $_SESSION['id-session-as'] = strtoupper($_POST['email']);
                        $_SESSION['taller'] = strtoupper("Admin");
                        echo '1';
                        
                    }else{
                        echo '0';
                    }
                }
                break;
            case 'encargado':
                if(isset($_POST['email'])&&isset($_POST['password'])){
                    $rwc = $objModelAsistencia->loginEncargado($_POST['email'], md5($_POST['password']));
                    if($rwc == 1){
                        $_SESSION['id-session-as'] = strtoupper($_POST['email']);
                        $_SESSION['taller'] = strtoupper($objModelAsistencia->getTallerEncargado($_POST['email'], md5($_POST['password'])));
                        echo '1';
                    }else{
                        echo '0';
                    }
                }
                break;        
        }
    }