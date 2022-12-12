<?php
require_once('../model/model.login.page.php');
$ModelLogin =  new modelLoginPage;
require_once('../libraries/system.control.php');
$systemControl = new SystemControl;
require_once('../const/key.php');
require_once('../model/model.global.page.php');
$mdlglobal = new DashboardGlobal;
if(isset($_REQUEST['user_activity'])){
    
session_start();
   switch($_REQUEST['user_activity']){
        case 'Alumno':
            if(isset($_POST['login-email']) && isset($_POST['login-password'])){
                    $s = $ModelLogin->loginAlumno($_POST['login-email'], md5($_POST['login-password']));
                    if($s == 1){
                        $_SESSION['user-logged'] = md5($_POST['login-email']);
                        $_SESSION['tipo-rol'] = "Alumno";
                        $_SESSION['user'] = $ModelLogin->getNameAlumno($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['id'] = $ModelLogin->getIDAlumno($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['md5'] = md5($_POST['login-password']);
                        $_SESSION['taller'] = $ModelLogin->getTalleralumno($_POST['login-email'], md5($_POST['login-password']));
                        echo trim($s);
                    }else{
                        echo 0;
                    }
            }else{
                echo 'error en el post';
            }
        break;
        case 'Docente':
            if(isset($_POST['login-email']) && isset($_POST['login-password'])){
                    $s = $ModelLogin->loginAdmin($_POST['login-email'], md5($_POST['login-password']));
                    if($s == 1){
                        try{
                            $_SESSION['user-logged'] = md5($_POST['login-email']);
                        $_SESSION['tipo-rol'] = "Administrador";
                        $_SESSION['user'] = $ModelLogin->getNameAdmin($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['id'] = $ModelLogin->getIDAdmin($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['md5'] = md5($_POST['login-password']);
                      
                        }catch(Exception $e){
                            echo $e;
                        }
                        echo trim($s);
                    }else{
                        echo 0;
                    }
            }else{
                echo 'error en el post';
            }
        break;
        case 'Encargado':
            if(isset($_POST['login-email']) && isset($_POST['login-password'])){
                    $s = $ModelLogin->loginEncargado($_POST['login-email'], md5($_POST['login-password']));
                    if($s == 1){
                        $_SESSION['user-logged'] = md5($_POST['login-email']);
                        $_SESSION['tipo-rol'] = "Encargado";
                        $_SESSION['user'] = $ModelLogin->getNameEncargado($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['id'] = $ModelLogin->getIdDocente($_POST['login-email'], md5($_POST['login-password']));
                        $_SESSION['md5'] = md5($_POST['login-password']);
                        $_SESSION['taller'] = $ModelLogin->getTallerEncargado($_POST['login-email'], md5($_POST['login-password']));
                        echo trim($s);
                    }else{
                        echo 0;
                    }
            }else{
                echo 'error en el post';
            }
        break;
        case 'forgot-password':
            if(isset($_POST['curp']) && isset($_POST['nocontrol']) && isset($_POST['tipo'])){
                $key = $_POST['key'];
                $nocontrol = $_POST['nocontrol'];
                $curp = $_POST['curp'];
                switch($_POST['tipo']){
                    case 'alumno':
                        echo $ModelLogin->forgotPasswordAlumno($curp, $nocontrol);
                    break;
                    case 'encargado':
                        $validations = 0;
                        for($i = 0; $i<= count(KEYS)-1; $i++){
                            if(KEYS[$i] == md5($key)){
                                $validations = $validations + 1;
                            }
                        }
                        if($validations == 1){
                            echo $ModelLogin->forgotPasswordEncargado($curp, $nocontrol);
                         }else{
                             echo "-111";
                         }
                    break;
                    default:
                    echo '0';
                    break;
                }
            }
            break;
            case 'restore':
                if(isset($_POST)){
                    $id = $_POST['id'];
                    $pass = md5($_POST['pwd']);
                    if(strlen($pass)>=4){
                        switch($_POST['type']){
                            case 'encargado':
                                echo $mdlglobal->updateEncargado($id, $pass);
                                break;
                            case 'alumno':
                                echo $mdlglobal->updateAlumno($id, $pass);
                            break;
                        }
                    }else{
                        echo "c-4";
                    }
                   
                }else{
                    echo "error en el post";
                }
            break;

   }
    
}else{
   $systemControl->setPageError();
}
