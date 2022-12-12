<?php 
include_once('../sql.connection/connection.php');
class modelLoginPage extends db{
    function __construct(){
        parent::__construct();
    }
    function loginAlumno($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE Curp = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        return $pst->rowCount();

    }
    function loginEncargado($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE Email = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        return $pst->rowCount();
    }
    function loginAdmin($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM administradores WHERE usuario = :Usuario and contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        return $pst->rowCount();
    }
    function getNameAlumno($Usuario, $Contrasena){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE Curp = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $Nombre = $result->NombreCompleto;
            }
        }else{
            $Nombre = "null";
        }
        return $Nombre;
    }
    function getNameEncargado($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE Email = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $Nombre = $result->NombreCompleto;
            }
        }else{
            $Nombre = "null";
        }
        return $Nombre;
    }
    function getNameAdmin($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM administradores WHERE usuario = :Usuario and contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $Nombre = $result->usuario;
            }
        }else{
            $Nombre = "null";
        }
        
        return $Nombre;
    }
    function getIDAlumno($Usuario, $Contrasena){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE Curp = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $id = $result->id;
            }
        }else{
            $id = "null";
        }
        return $id;
    }
    function getIdDocente($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE Email = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $id = $result->id_docente;
            }
        }else{
            $id = "null";
        }
        return $id;
    }
    function getIDAdmin($Usuario, $Contraseña){
        $pst = $this->mysql->prepare("SELECT *FROM administradores WHERE usuario = :Usuario and contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $id = $result->accountid;
            }
        }else{
            $id = "null";
        }
        
        return $id;
    }
    function getTalleralumno($Usuario, $Contrasena){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE Curp = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $taller = $result->Taller;
            }
        }else{
            $taller = "null";
        }
        return $taller;
    }
    function getTallerEncargado($Usuario, $Contrasena){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE Email = :Usuario and Contraseña = :Contrasena");
        $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->execute();
        $results= $pst->fetchAll(PDO::FETCH_OBJ);
        if($pst->rowCount() > 0){
            foreach($results as $result){
                $Taller = $result->Taller;
            }
        }else{
            $Taller = "null";
        }
        return $Taller;
    }
        function forgotPasswordAlumno($Curp, $Nocontrol){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE NoControl = :no and Curp = :Curp");
        $pst->bindParam(":no", $Nocontrol, PDO::PARAM_STR);
        $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $result){
                $id = $result->id;
            }
            return $id;
        }else{
            return "0";
        }
    }
    function forgotPasswordEncargado($Curp, $Nocontrol){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE NoControl = :no and Curp = :Curp");
        $pst->bindParam(":no", $Nocontrol, PDO::PARAM_STR);
        $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $result){
                $id = $result->id_docente;
            }
            return $id;
        }else{
            return "0";
        }
    }
}