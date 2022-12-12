<?php
require_once('../sql.connection/connection.php');
require_once('../const/hrs.percent.php');
class DashboardGlobal extends db{
    function __construct(){
        parent::__construct();
    }
    //Esta funcion saca el porcentaje de nuestro progreso en el programa

    function setPercentage($TypePercentage,$Horas){
        switch($TypePercentage){
            case 'servicio':
                $res = ($Horas * 100) / HRS_SERVICIO_SOCIAL;
                break;
            case 'taller':
                $res = ($Horas * 100) / HRS_TALLER_CULTURAL;
                break;
        }
        return number_format((float)$res, 2, '.', '');
    }
    //end comment

    function countPreregistro(){
        $pst = $this->mysql->prepare("SELECT *FROM pre_registro");
        $pst->execute();
        return $pst->rowCount();
    }

    function demissAlumno($id){
        $pst = $this->mysql->prepare("DELETE FROM pre_registro where id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $res = $pst->execute();
        if($res == 1){
            return true;
        }else{
            return false;
        }
    }
    function acceptStudent($NoControl, $Contrasena, $NombreCompleto, $Curp, $GradoGrupo, $Taller, $Genero, $FechaNacimiento, $Domicilio, $Telefono, $Email, $Foto){
        $pst = $this->mysql->prepare("INSERT INTO alumno VALUES(null, :NoControl,  :Contrasena, :NombreCompleto, :Curp, :GradoGrupo, :Taller, :Genero, :Fecha, :Domicilio, :Telefono, :Email, :Foto)");
        $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR);
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->bindParam(":NombreCompleto", $NombreCompleto, PDO::PARAM_STR);
        $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
        $pst->bindParam(":GradoGrupo", $GradoGrupo, PDO::PARAM_STR);
        $pst->bindParam(":Taller", $Taller, PDO::PARAM_STR);
        $pst->bindParam(":Genero", $Genero, PDO::PARAM_STR);
        $pst->bindParam(":Fecha", $FechaNacimiento, PDO::PARAM_STR);
        $pst->bindParam(":Domicilio", $Domicilio, PDO::PARAM_STR);
        $pst->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $pst->bindParam(":Email", $Email, PDO::PARAM_STR);
        $pst->bindParam(":Foto", $Foto, PDO::PARAM_STR);
        $res = $pst->execute();
        return $res;
    }
    function fetchpre_with_id($id){
        $pst = $this->mysql->prepare("SELECT *from pre_registro where id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl, 
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                    "RutaFoto"=> $item->Foto,
                    "RutaCertificado"=> $item->Certificado,
                    "CartaCompromiso" => $item->CartaCompromiso
                );
            }
            return json_encode($data);
        }else{
            return false;
        }
    }
    function demissManager($id){
        $pst = $this->mysql->prepare("DELETE FROM encargado where id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $res = $pst->execute();
        if($res == 1){
            return true;
        }else{
            return false;
        }
    }
    function existManager($NoControl){
        $pst = $this->mysql->prepare("SELECT *FROM docente WHERE NoControl = :NoControl");
        $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    function existStudent($NoControl){
        $pst = $this->mysql->prepare("SELECT *FROM alumno WHERE NoControl = :NoControl");
        $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    function fetch_manager_by_id($id){
        $pst = $this->mysql->prepare("SELECT *FROM encargado WHERE id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item)
            {
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl,
                    "Contraseña"=> $item->Contraseña,
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                    "RutaFoto"=> $item->Foto,
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function acceptManager($NoControl, $Contrasena, $NombreCompleto, $Curp,  $GradoGrupo, $Taller, $Genero, $FechaNacimiento, $Domicilio, $Telefono, $Email, $Foto){
        //$pst = $this->mysql->prepare("INSERT INTO docente VALUES(null, :NoControl,  :Contrasena, :NombreCompleto, :Curp, GradoGrupo, :Taller, :Genero, :Fecha, :Domicilio, :Telefono, :Email, :Foto)");
        $pst = $this->mysql->prepare("INSERT INTO docente VALUES(null, :NoControl, :Contrasena, :NombreCompleto, :Curp, :GradoGrupo, :Taller, :Genero, :Fecha, :Domicilio, :Telefono, :Email, :Foto)");
        $pst->bindParam(":NoControl", $NoControl, PDO::PARAM_STR); 
        $pst->bindParam(":Contrasena", $Contrasena, PDO::PARAM_STR);
        $pst->bindParam(":NombreCompleto", $NombreCompleto, PDO::PARAM_STR);
        $pst->bindParam(":Curp", $Curp, PDO::PARAM_STR);
        $pst->bindParam(":GradoGrupo", $GradoGrupo, PDO::PARAM_STR);
        $pst->bindParam(":Taller", $Taller, PDO::PARAM_STR);
        $pst->bindParam(":Genero", $Genero, PDO::PARAM_STR);
        $pst->bindParam(":Fecha", $FechaNacimiento, PDO::PARAM_STR);
        $pst->bindParam(":Domicilio", $Domicilio, PDO::PARAM_STR);
        $pst->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $pst->bindParam(":Email", $Email, PDO::PARAM_STR);
        $pst->bindParam(":Foto", $Foto, PDO::PARAM_STR);
        $res = $pst->execute();
        return $res;
    }
    //---------------------FETCH OBJ-------------------------------------------
    function fetchpreregistro(){
        $pst = $this->mysql->prepare("SELECT *FROM pre_registro");
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchall(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl, 
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                    "RutaFoto"=> $item->Foto,
                    "RutaCertificado"=> $item->Certificado,
                    "CartaCompromiso" => $item->CartaCompromiso
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    
    function fetchEncargado(){
        $pst = $this->mysql->prepare("SELECT *FROM encargado");
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchall(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl, 
                    "Contraseña" => $item->Contraseña,
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                    "RutaFoto"=> $item->Foto,
                );
            }
            return json_encode($data);

        }else{
            return "0";
        }
    }
    function updateAdmin($id, $user, $password){
        $pst = $this->mysql->prepare("UPDATE administradores SET usuario = :user,  contraseña = :pass WHERE accountid = :id");
        $pst->bindParam(":user", $user, PDO::PARAM_STR);
        $pst->bindParam(":pass", $password, PDO::PARAM_STR);
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }          
    function updateAlumno($id, $password){
        $pst = $this->mysql->prepare("UPDATE alumno SET Contraseña = :pass WHERE id = :id");
        $pst->bindParam(":pass", $password, PDO::PARAM_STR);
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    function updateEncargado($id, $password){
        $pst = $this->mysql->prepare("UPDATE docente SET Contraseña = :pass where id_docente = :id");
        $pst->bindParam(":pass", $password, PDO::PARAM_STR);
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    //--------------------------ROW COUNTS--------------------------------------
    function rowCountPreregistros(){
        $pst = $this->mysql->prepare("SELECT *from pre_registro");
        $pst->execute();
        return $pst->rowCount();
    }
    function rowCountServicio(){
        $pst = $this->mysql->prepare("SELECT *from encargado");
        $pst->execute();
        return $pst->rowCount();
    }
    function rowCountComments(){
        $pst = $this->mysql->prepare("SELECT *from sugerencias");
        $pst->execute();
        return $pst->rowCount();
    }
    function rowCountAlumno(){
        $pst = $this->mysql->prepare("SELECT *from alumno");
        $pst->execute();
        return $pst->rowCount();
    }
    function filter_pre_by_genre($genre){
        $pst = $this->mysql->prepare("SELECT *from pre_registro WHERE Genero = :genre");
        $pst->bindParam(":genre", $genre, PDO::PARAM_STR);
        $pst->execute();
        return $pst->rowCount();
    }
    function filter_by_genre($genre){
        $pst = $this->mysql->prepare("SELECT *from alumno WHERE Genero = :genre");
        $pst->bindParam(":genre", $genre, PDO::PARAM_STR);
        $pst->execute();
        return $pst->rowCount();
    }
    //--------------------------FILTER BY TALLER
    function filter_student_by_class($taller){
        $pst = $this->mysql->prepare("SELECT *from alumno WHERE Taller = :taller");
        $pst->bindParam(":taller", $taller, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount() > 0){
            $alumnos = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($alumnos as $item){
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl,
                    "Contraseña"=> $item->Contraseña,
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                    "RutaFoto"=> $item->Foto,
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
        function fetch_students(){
        $pst = $this->mysql->prepare("SELECT *from alumno");
        $pst->execute();
        if($pst->rowCount() > 0){
            $alumnos = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($alumnos as $item){
                $data[] = array(
                    "id" => $item->id, 
                    "NoControl"=> $item->NoControl,
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
        
    }
    function fetchDocente(){
        $pst = $this->mysql->prepare("SELECT *from docente");
        $pst->execute();
        if($pst->rowCount() > 0){
            $alumnos = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($alumnos as $item){
                $data[] = array(
                    "id" => $item->id_docente, 
                    "NoControl"=> $item->NoControl,
                    "Nombre"=> $item->NombreCompleto,
                    "Curp"=> $item->Curp,
                    "GradoGrupo" => $item->GradoGrupo,
                    "Taller" => $item->Taller,
                    "Genero" => $item->Genero, 
                    "FechaNacimiento" => $item->FechaNacimiento,
                    "Domicilio" => $item->Domicilio,
                    "Telefono" => $item->Telefono, 
                    "Email" => $item->Email,
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
        
    }
    function dar_baja_encargado($id){
      try{
        $pst = $this->mysql->prepare("DELETE FROM docente where id_docente = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }
    function getCountasisencargado($id){
        $pst = $this->mysql->prepare("SELECT *FROM asistencia_encargado inner join docente on docente.id_docente = asistencia_encargado.encargado_id where encargado_id = :id ");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        return $pst->rowCount();
    }
    function countevidencies($id){
        $pst = $this->mysql->prepare("SELECT *FROM evidencias inner join docente on docente.id_docente = evidencias.id_encargado where id_encargado = :id ");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        return $pst->rowCount();
    }
    function borrar_asistencias_encargado($id){
        $pst = $this->mysql->prepare("DELETE FROM asistencia_encargado WHERE encargado_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    function deleteevi($id){
        $pst = $this->mysql->prepare("DELETE FROM evidencias WHERE id_encargado = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    

    function dar_baja_alumno($id){
        $pst = $this->mysql->prepare("DELETE FROM alumno where id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    function getCountAsisAlumno($id){
        $pst = $this->mysql->prepare("SELECT *FROM asistencia_alumno inner join alumno on alumno.id = asistencia_alumno.alumno_id where alumno_id = :id ");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        return $pst->rowCount();
    }
    function borrar_asistencias_alumno($id){
        $pst = $this->mysql->prepare("DELETE FROM asistencia_alumno WHERE alumno_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        return $pst->execute();
    }
    function getComments(){
        $pst = $this->mysql->prepare("SELECT *from sugerencias");
        $pst->execute();
        if($pst->rowCount() > 0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    'id'=>$item->idsugerencia,
                    'nombre'=> $item->nombre,
                    'telefono'=> $item->telefono,
                    'email'=> $item->email,
                    'ip'=> $item->ip,
                    'fecha'=> $item->fecha
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function get_comment_by_id($id){
        $pst = $this->mysql->prepare("SELECT *from sugerencias WHERE idsugerencia = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount() > 0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    'id'=>$item->idsugerencia,
                    'nombre'=> $item->nombre,
                    'telefono'=> $item->telefono,
                    'email'=> $item->email,
                    'mensaje'=> $item->mensaje,
                    'ip'=> $item->ip,
                    'fecha'=> $item->fecha
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function gethoursencargado($id){
        $pst = $this->mysql->prepare("SELECT horas FROM asistencia_encargado inner join docente on docente.id_docente = asistencia_encargado.encargado_id where encargado_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
           foreach($results as $item){
               $data[] = array(
                   'horas'=> $item->horas
               );
           }
           return json_encode($data);
        }else{
            return "0";
        }
    }
    function gethrsalumno($id){
        $pst = $this->mysql->prepare("SELECT horas FROM asistencia_alumno inner join alumno on alumno.id = asistencia_alumno.alumno_id where alumno_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
           foreach($results as $item){
               $data[] = array(
                   'horas'=> $item->horas
               );
           }
           return json_encode($data);
        }else{
            return "0";
        }
    }
    function fetch_asistencia_alumno_by_id($id){
        $pst = $this->mysql->prepare("SELECT *from asistencia_alumno where alumno_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    'estado'=> $item->Estado,
                    'fecha'=> $item->Fecha,
                    'hora_entrada'=> $item->Hora_Entrada,
                    'hora_salida'=> $item->Hora_Salida,
                    'Horas'=> $item->Horas
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function fetch_asistencia_encargado_by_id($id){
        $pst = $this->mysql->prepare("SELECT *from asistencia_encargado where encargado_id = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $item){
                $data[] = array(
                    'estado'=> $item->Estado,
                    'fecha'=> $item->Fecha,
                    'hora_entrada'=> $item->Hora_Entrada,
                    'hora_salida'=> $item->Hora_Salida,
                    'Horas'=> $item->Horas
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
}