<?php
include_once('../sql.connection/connection.php');
    class modelRegistros extends db{
        function __construct(){
            parent::__construct();
        }
        public function registra_alumno($NoControl, $NombreCompleto, $Curp, $GradoGrupo, $Taller, $Genero, $FechaNacimiento, $Domicilio, $Telefono, $Email, $RutaFoto,  $RutaCertificado, $RutaCartaCompromiso){
            $pst = $this->mysql->prepare("INSERT INTO pre_registro values(null, :NoControl, :NombreCompleto, :Curp, :GradoGrupo, :Taller, :Genero, :FechaNacimiento, :Domicilio, :Telefono, :Email, :RutaFoto, :RutaCertificado, :RutaCartaCompromiso)");
            $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR);
            $pst->bindParam(":NombreCompleto", $NombreCompleto, PDO::PARAM_STR);
            $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
            $pst->bindParam(":GradoGrupo", $GradoGrupo, PDO::PARAM_STR);
            $pst->bindParam(":Taller", $Taller, PDO::PARAM_STR);
            $pst->bindParam(":Genero", $Genero, PDO::PARAM_STR);
            $pst->bindParam(":FechaNacimiento", $FechaNacimiento, PDO::PARAM_STR);
            $pst->bindParam(":Domicilio", $Domicilio, PDO::PARAM_STR);
            $pst->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
            $pst->bindParam(":Email", $Email, PDO::PARAM_STR);
            $pst->bindParam(":RutaFoto", $RutaFoto, PDO::PARAM_STR);
            $pst->bindParam(":RutaCertificado", $RutaCertificado, PDO::PARAM_STR);
            $pst->bindParam(":RutaCartaCompromiso", $RutaCartaCompromiso, PDO::PARAM_STR);
            //#
            return $pst->execute();
        }
        public function verifyPre($TipoVerificacion, $Param){
            switch($TipoVerificacion){
                case "NoControl":
                    $pst = $this->mysql->prepare("SELECT *FROM pre_registro where NoControl = :NoControl");
                    $pst->bindParam(':NoControl', $Param, PDO::PARAM_STR);
                    break;
                case "Email":
                    $pst = $this->mysql->prepare("SELECT *FROM pre_registro where Email = :Email");
                    $pst->bindParam(':Email', $Param, PDO::PARAM_STR);
                     break;
                case "Curp":
                    $pst = $this->mysql->prepare("SELECT *FROM pre_registro where Curp = :Curp");
                    $pst->bindParam(':Curp', $Param, PDO::PARAM_STR);
                break;
            }
         $pst->execute();
         return $pst->rowCount();
        }
        public function verifyServ($TipoVerificacion, $Param){
            switch($TipoVerificacion){
                case "NoControl":
                    $pst = $this->mysql->prepare("SELECT *FROM encargado where NoControl = :NoControl");
                    $pst->bindParam(':NoControl', $Param, PDO::PARAM_STR);
                    break;
                case "Email":
                    $pst = $this->mysql->prepare("SELECT *FROM encargado where Email = :Email");
                    $pst->bindParam(':Email', $Param, PDO::PARAM_STR);
                     break;
                case "Curp":
                    $pst = $this->mysql->prepare("SELECT *FROM encargado where Curp = :Curp");
                    $pst->bindParam(':Curp', $Param, PDO::PARAM_STR);
                break;
            }
         $pst->execute();
         return $pst->rowCount();
        }
        public function registra_serv($NoControl, $Contraseña, $NombreCompleto, $Curp, $GradoGrupo, $Taller, $Genero, $FechaNacimiento, $Domicilio, $Telefono, $Email, $RutaFoto){
            $pst = $this->mysql->prepare("INSERT INTO encargado values(null, :NoControl, :Contrasena, :NombreCompleto, :Curp, :GradoGrupo, :Taller, :Genero, :FechaNacimiento, :Domicilio, :Telefono, :Email, :RutaFoto)");
            $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR);
            $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
            $pst->bindParam(":NombreCompleto", $NombreCompleto, PDO::PARAM_STR);
            $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
            $pst->bindParam(":GradoGrupo", $GradoGrupo, PDO::PARAM_STR);
            $pst->bindParam(":Taller", $Taller, PDO::PARAM_STR);
            $pst->bindParam(":Genero", $Genero, PDO::PARAM_STR);
            $pst->bindParam(":FechaNacimiento", $FechaNacimiento, PDO::PARAM_STR);
            $pst->bindParam(":Domicilio", $Domicilio, PDO::PARAM_STR);
            $pst->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
            $pst->bindParam(":Email", $Email, PDO::PARAM_STR);
            $pst->bindParam(":RutaFoto", $RutaFoto, PDO::PARAM_STR);
            //#
            return $pst->execute();
        }
    }