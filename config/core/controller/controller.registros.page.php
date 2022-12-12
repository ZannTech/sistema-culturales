<?php
require_once('../model/model.registros.page.php');
require_once('../libraries/getIPAdress.php');
require_once('../libraries/system.control.php');
require_once('../const/size.files.php');
$register = new modelRegistros;
$systemControl = new SystemControl;
if (isset($_REQUEST['register'])) {
    if ($_REQUEST['register'] == 'registrar_alumno') {
        if (
            isset($_POST['inombre']) && isset($_POST['icontrol'])
            && isset($_POST['iap']) && isset($_POST['iam'])
            && isset($_POST['icurp']) && isset($_POST['igrado']) && isset($_POST['igrupo'])
            && isset($_POST['italler']) && isset($_POST['igen']) && isset($_POST['ifecha']) && isset($_POST['country']) && isset($_POST['postcode']) && isset($_POST['icalle']) && isset($_POST['inumcasa']) && isset($_POST['city']) && isset($_POST['itel']) && isset($_POST['iemail']) && isset($_POST['ideporte'])
        ) {
            //validar campos
            if (strlen($_POST['icontrol']) == 14 && $_POST['icontrol'] > 0) {
                if (strlen($_POST['icurp']) == 18) {
                    if (strlen($_POST['iap']) >= 4 || strlen($_POST['iam']) >= 4) {
                        if (strlen($_POST['city']) >= 0) {
                            if (strlen($_POST['itel']) >= 10 && $_POST['itel'] > 0) {
                                if (strlen($_POST['inombre']) >= 3) {
                                    if (strlen($_POST['inumcasa']) >= 0) {
                                        if (strlen($_POST['icalle']) >= 3) {
                                            if ($_POST['igrado'] != "" && $_POST['igrupo'] != "") {
                                                //Validaciones de archivos
                                                $tamaño = $_FILES['icarta']['size'];
                                                if ($_FILES['ifotografia']['type'] == "image/jpeg" || $_FILES['ifotografia']['type'] == "image/jpg") {
                                                    if ($_FILES['icertificado']['type'] == "application/pdf") {
                                                        if ($_FILES['icarta']['type'] == "application/pdf") {
                                                            if ($register->verifyPre("NoControl", $_POST['icontrol']) == 0) {
                                                                if ($register->verifyPre("Email",  $_POST['iemail']) == 0) {
                                                                    if ($register->verifyPre("Curp", $_POST['icurp']) == 0) {
                                                                        if ($_FILES['ifotografia']['size'] <= 2*MB) {
                                                                            if ($_FILES['icertificado']['size'] <= 2*MB) {
                                                                                if ($_FILES['icarta']['size'] <= 2*MB) {
                
                                                                                    ////////////////////////////////////////////
                                                                                    $CodPostal = $_POST['postcode'];
                                                                                    $Calle = $_POST['icalle'];
                                                                                    $NumCasa = $_POST['inumcasa'];
                                                                                    $Colonia = $_POST['city'];
                                                                                    $route = md5($_POST['igrado'] . "-" . $_POST['igrupo'] . "/" . $_POST['italler'] . "/" . $_POST['icurp']).md5(rand(0, 1000));
                                                                                    //MOVIMIENTOS AL SERVIDOR
                                                                                    $NombreCompleto =  strtoupper($_POST['inombre'] . ' ' . $_POST['iap'] . ' ' . $_POST['iam']);
                                                                                    $RutaBase = "Public/Docs/Pre-registro/". $route . "/";
                                                                                    $Route = "../../../Public/Docs/Pre-registro/". $route . "/";
                                                                                    //ESTA RUTA SE INTRODUCIRA A LA BASE DE DATOS (CONCATENAMOS EL NOMBRE DEL ARCHIVO)
                                                                                    $RutaBaseFoto = $RutaBase . $NombreCompleto . "Fotografia.jpg";
                                                                                    $RutaBaseCertificado = $RutaBase . $NombreCompleto . "Certificado medico.pdf";
                                                                                    $RutaBaseCarta = $RutaBase . $NombreCompleto . "Carta compromiso.pdf";

                                                                                    //RUTAS AL SERVIDOR
                                                                                    $RutaServFoto = $Route . $NombreCompleto . "Fotografia.jpg";
                                                                                    $RutaServCertificado = $Route . $NombreCompleto . "Certificado medico.pdf";
                                                                                    $RutaServCarta = $Route . $NombreCompleto . "Carta compromiso.pdf";

                                                                                    $Domicilio = "MX " . $CodPostal . " Colonia: " . $Colonia . " Calle: " . $Calle . " #" . $NumCasa;
                                                                                    if (!(file_exists($Route))) {
                                                                                        $res = $register->registra_alumno(
                                                                                            strtoupper($_POST['icontrol']),
                                                                                            strtoupper($_POST['inombre'] . ' ' . $_POST['iap'] . ' ' . $_POST['iam']),
                                                                                            strtoupper($_POST['icurp']),
                                                                                            strtoupper($_POST['igrado'] . '°' . $_POST['igrupo']),
                                                                                            strtoupper($_POST['italler']),
                                                                                            $_POST['igen'],
                                                                                            $_POST['ifecha'],
                                                                                            $Domicilio,
                                                                                            $_POST['itel'],
                                                                                            $_POST['iemail'],
                                                                                            $RutaBaseFoto,
                                                                                            $RutaBaseCertificado,
                                                                                            $RutaBaseCarta
                                                                                        );
                                                                                        if ($res == 1) {
                                                                                            try {
                                                                                                mkdir($Route, 0777, true);
                                                                                                move_uploaded_file($_FILES['ifotografia']['tmp_name'], $RutaServFoto);
                                                                                                move_uploaded_file($_FILES['icertificado']['tmp_name'], $RutaServCertificado);
                                                                                                move_uploaded_file($_FILES['icarta']['tmp_name'], $RutaServCarta);
                                                                                                echo 1;
                                                                                            } catch (Exception $e) {
                                                                                                echo "Has sido registrado con exito, pero tus archivos no se enviaron correctamente. mandanos un correo electronico a culturalecbtis@gmail.com ";
                                                                                            }
                                                                                        } else {
                                                                                            echo "Hubo un error al registrarte";
                                                                                        }
                                                                                    } else {
                                                                                        $res = $register->registra_alumno(
                                                                                            strtoupper($_POST['icontrol']),
                                                                                            strtoupper($_POST['inombre'] . ' ' . $_POST['iap'] . ' ' . $_POST['iam']),
                                                                                            strtoupper($_POST['icurp']),
                                                                                            strtoupper($_POST['igrado'] . '°' . $_POST['igrupo']),
                                                                                            strtoupper($_POST['italler']),
                                                                                            $_POST['igen'],
                                                                                            $_POST['ifecha'],
                                                                                            $Domicilio,
                                                                                            $_POST['itel'],
                                                                                            $_POST['iemail'],
                                                                                            $RutaBaseFoto,
                                                                                            $RutaBaseCertificado,
                                                                                            $RutaBaseCarta
                                                                                        );
                                                                                        echo "<b>registrado</b>, con errores comunicate con nuestros desarrolladores o directamente con palafox";
                                                                                    }
                                                                                } else {
                                                                                    echo ('La carta compromiso sobrepasa el tamaño admitido <b>2 MB</b>' .$tamaño);
                                                                                }
                                                                            } else {
                                                                                echo ('El certificado sobrepasa el tamaño admitido <b>2 MB</b>');
                                                                            }
                                                                        } else {
                                                                            echo ('La fotografía sobrepasa el tamaño admitido <b>1 MB</b>');
                                                                        }
                                                                    } else {
                                                                        echo ("Este curp ya ha sido registrado");
                                                                    }
                                                                } else {
                                                                    echo ("Este email ya ha sido registrado");
                                                                }
                                                            } else {
                                                                echo ("Este número de control ya ha sido registrado");
                                                            }
                                                        } else {
                                                            echo 'Extensión del archivo carta compromiso no válida <b>Solo PDF</b>';
                                                        }
                                                    } else {
                                                        echo 'Extensión del archivo certificado médico no válida <b>Solo PDF</b>';
                                                    }
                                                } else {
                                                    echo 'Extensión de la imágen no válida, solo se aceptan <b>JPEG ó JPG</b>';
                                                }
                                            } else {
                                                echo "Grado y/o grupo incorrectos";
                                            }
                                        } else {
                                            echo 'Calle Inválida';
                                        }
                                    } else {
                                        echo "Numero Int. Inválido";
                                    }
                                } else {
                                    echo "Nombre inválido";
                                }
                            } else {
                                echo "Teléfono inválido";
                            }
                        } else {
                            echo 'Colonia no válida';
                        }
                    } else {
                        echo "Apellidos no válidos";
                    }
                } else {
                    echo 'Curp incorrecta';
                }
            } else {
                echo "Número de control incorrecto" . strlen($_POST['icontrol']);
            }
        } else {
            $systemControl->setPageError();
        }
    }
    if ($_REQUEST['register'] == 'registrar_servicio') {
        $a = 1;
        if (
            isset($_POST['inombre']) && isset($_POST['icontrol'])
            && isset($_POST['iap']) && isset($_POST['iam'])
            && isset($_POST['icurp']) && isset($_POST['igrado']) && isset($_POST['igrupo'])
            && isset($_POST['italler']) && isset($_POST['igen']) && isset($_POST['ifecha']) && isset($_POST['country']) && isset($_POST['postcode']) && isset($_POST['icalle']) && isset($_POST['inumcasa']) && isset($_POST['city']) && isset($_POST['itel']) && isset($_POST['iemail'])
        ) {
            if (strlen($_POST['icontrol']) == 14 && $_POST['icontrol'] > 0) {
                if (strlen($_POST['icurp']) == 18) {
                    if (strlen($_POST['iap']) >= 4 || strlen($_POST['iam']) >= 4) {
                        if (strlen($_POST['city']) >= 0) {
                            if (strlen($_POST['itel']) >= 10 && $_POST['itel'] > 0) {
                                if (strlen($_POST['inombre']) >= 3) {
                                    if (strlen($_POST['inumcasa']) >= 0) {
                                        if (strlen($_POST['icalle']) >= 3) {
                                            if ($_POST['igrado'] != "" && $_POST['igrupo'] != "") {
                                                //Validaciones de archivos
                                                if ($_FILES['ifotografia']['type'] == "image/jpeg" || $_FILES['ifotografia']['type'] == "image/jpg") {
                                                    if ($a == 1) {
                                                        if ($a == 1) {
                                                            if ($register->verifyServ("NoControl", $_POST['icontrol']) == 0) {
                                                                if ($register->verifyServ("Email",  $_POST['iemail']) == 0) {
                                                                    if ($register->verifyServ("Curp", $_POST['icurp']) == 0) {
                                                                        if ($_FILES['ifotografia']['size'] <= 1048576) {
                                                                            $CodPostal = $_POST['postcode'];
                                                                            $Calle = $_POST['icalle'];
                                                                            $NumCasa = $_POST['inumcasa'];
                                                                            $Colonia = $_POST['city'];
                                                                            $route = md5($_POST['igrado'] . "-" . $_POST['igrupo'] . "/" . $_POST['italler'] . "/" . $_POST['icurp']).md5(rand(0, 1000));
                                                                            //MOVIMIENTOS AL SERVIDOR
                                                                            $NombreCompleto =  strtoupper($_POST['inombre'] . ' ' . $_POST['iap'] . ' ' . $_POST['iam']);
                                                    
                                                                            $RutaBase = "Public/Docs/Servicio-Social/" .$route . "/";
                                                                            $Route = "../../../Public/Docs/Servicio-Social/" .$route . "/";
                                                                            //ESTA RUTA SE INTRODUCIRA A LA BASE DE DATOS (CONCATENAMOS EL NOMBRE DEL ARCHIVO)
                                                                            $RutaBaseFoto = $RutaBase . $NombreCompleto . "Fotografia.jpg";
                                                                            $RutaBaseCertificado = $RutaBase . $NombreCompleto . "Certificado medico.pdf";
                                                                            $RutaBaseCarta = $RutaBase . $NombreCompleto . "Carta compromiso.pdf";

                                                                            //RUTAS AL SERVIDOR
                                                                            $RutaServFoto = $Route . $NombreCompleto . "Fotografia.jpg";
                                                                            $RutaServCertificado = $Route . $NombreCompleto . "Certificado medico.pdf";
                                                                            $RutaServCarta = $Route . $NombreCompleto . "Carta compromiso.pdf";

                                                                            $Domicilio = "MX " . $CodPostal . " Colonia: " . $Colonia . " Calle: " . $Calle . " #" . $NumCasa;
                                                                            if (!(file_exists($Route))) {
                                                                                $res = $register->registra_serv(
                                                                                    strtoupper($_POST['icontrol']),
                                                                                    md5($_POST['icontraseña']),
                                                                                    strtoupper($_POST['inombre'] . ' ' . $_POST['iap'] . ' ' . $_POST['iam']),
                                                                                    strtoupper($_POST['icurp']),
                                                                                    strtoupper($_POST['igrado'] . '°' . $_POST['igrupo']),
                                                                                    strtoupper($_POST['italler']),
                                                                                    $_POST['igen'],
                                                                                    $_POST['ifecha'],
                                                                                    $Domicilio,
                                                                                    $_POST['itel'],
                                                                                    $_POST['iemail'],
                                                                                    $RutaBaseFoto
                                                                                );
                                                                                if ($res == 1) {
                                                                                    try {
                                                                                        mkdir($Route, 0777, true);
                                                                                        move_uploaded_file($_FILES['ifotografia']['tmp_name'], $RutaServFoto);
                                                                                        echo 1;
                                                                                    } catch (Exception $e) {
                                                                                        echo "Has sido registrado con exito, pero tus archivos no se enviaron correctamente. mandanos un correo electronico a culturalecbtis@gmail.com ";
                                                                                    }
                                                                                } else {
                                                                                    echo "Hubo un error al registrarte";
                                                                                }
                                                                            } else {
                                                                                echo "Hay un error en los servidores, recarga la página de nuevo";
                                                                            }
                                                                        } else {
                                                                            echo ('La fotografía sobrepasa el tamaño admitido <b>1 MB</b>');
                                                                        }
                                                                    } else {
                                                                        echo ("Este curp ya ha sido registrado");
                                                                    }
                                                                } else {
                                                                    echo ("Este email ya ha sido registrado");
                                                                }
                                                            } else {
                                                                echo ("Este número de control ya ha sido registrado");
                                                            }
                                                        } else {
                                                            echo 'Extensión del archivo carta compromiso no válida <b>Solo PDF</b>';
                                                        }
                                                    } else {
                                                        echo 'Extensión del archivo certificado médico no válida <b>Solo PDF</b>';
                                                    }
                                                } else {
                                                    echo 'Extensión de la imágen no válida, solo se aceptan <b>JPEG ó JPG</b>';
                                                }
                                            } else {
                                                echo "Grado y/o grupo incorrectos";
                                            }
                                        } else {
                                            echo 'Calle Inválida';
                                        }
                                    } else {
                                        echo "Numero Int. Inválido";
                                    }
                                } else {
                                    echo "Nombre inválido";
                                }
                            } else {
                                echo "Teléfono inválido";
                            }
                        } else {
                            echo 'Colonia no válida';
                        }
                    } else {
                        echo "Apellidos no válidos";
                    }
                } else {
                    echo 'Curp incorrecta';
                }
            } else {
                echo "Número de control incorrecto" . strlen($_POST['icontrol']);
            }
        }
    }
} else {
    $systemControl->setPageError();
}
