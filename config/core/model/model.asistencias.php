<?php
require_once('../sql.connection/connection.php');
    class modelAsistencias extends db{
        function __construct(){
            parent::__construct();
        }
        //----------------------------------------------------------------
            //LOGIN METHODS
            function loginEncargado($Usuario, $Contraseña){
                $pst = $this->mysql->prepare("SELECT *FROM docente WHERE NoControl = :Usuario and Contraseña = :Contrasena");
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
            function getTallerEncargado($Usuario, $Contraseña){
                $pst = $this->mysql->prepare("SELECT *FROM docente WHERE NoControl = :Usuario and Contraseña = :Contrasena");
                $pst->bindParam(":Usuario", $Usuario, PDO::PARAM_STR);
                $pst->bindParam(":Contrasena", $Contraseña, PDO::PARAM_STR);
                $pst->execute();
                $results= $pst->fetchAll(PDO::FETCH_OBJ);
                if($pst->rowCount() > 0){
                    foreach($results as $result){
                        $Nombre = $result->Taller;
                    }
                }else{
                    $Nombre = "null";
                }
                return $Nombre;
            }


        //----------------------------------------------------------------



        
        //----------------------------------------------------------------
            ///TRAER LOS ALUMNOS DE LA BASE DE DATOS DEPENDIENDO DEL TALLER
            function fetchAlumno($Taller){
                $pst = $this->mysql->prepare("SELECT *FROM alumno where Taller = :Taller");
                $pst->bindParam(":Taller", $Taller, PDO::PARAM_STR);
                $pst->execute();
                $results = $pst->fetchAll(PDO::FETCH_OBJ);
                
                if($pst->rowCount() > 0 ){
                    foreach($results as $result){
                        $alumno[] = array(
                            'ID'=>$result->id,
                            'NO_C'=>$result->NoControl,
                            'Nombre'=>$result->NombreCompleto,
                            'Taller'=>$result->Taller,
                            'GradoGrupo'=>$result->GradoGrupo
                        );
                    }    
                    $alumnos = json_encode($alumno);
                }else{
                    $alumnos = "NO";
                }
                return $alumnos;
            }
            function fetchEncargado(){
                $pst = $this->mysql->prepare("SELECT *FROM docente");
                $pst->execute();
                $results = $pst->fetchAll(PDO::FETCH_OBJ);
                if($pst->rowCount() > 0 ){
                    foreach($results as $result){
                        $alumno[] = array(
                            'ID'=>$result->id_docente,
                            'NO_C'=>$result->NoControl,
                            'Nombre'=>$result->NombreCompleto,
                            'Taller'=>$result->Taller,
                            'GradoGrupo'=>$result->GradoGrupo
                        );
                    }    
                    $alumnos = json_encode($alumno);
                }else{
                    $alumnos = "0";
                }
                return $alumnos;
            }
          
        //----------------------------------------------------------------
       
        //------------------------------
            //insercion de datos
            function insertAsistenciaAlumno($Estado, $Fecha, $HoraEntrada, $HoraSalida, $Horas, $IdAlumno)
            {
                $pst  = $this->mysql->prepare("INSERT INTO asistencia_alumno VALUES(null, :Estado, :Fecha, :HoraEntrada, :HoraSalida, :Horas, :id)");
                $pst->bindParam(":Estado", $Estado, PDO::PARAM_STR);
                $pst->bindParam(":Fecha", $Fecha, PDO::PARAM_STR);
                $pst->bindParam(":HoraEntrada", $HoraEntrada, PDO::PARAM_STR);
                $pst->bindParam(":HoraSalida", $HoraSalida, PDO::PARAM_STR);
                $pst->bindParam(":Horas", $Horas, PDO::PARAM_STR);
                $pst->bindParam(":id", $IdAlumno, PDO::PARAM_INT);
                $r = $pst->execute();
                if($r == 1){
                    return true;
                }else{
                    return false;
                }
            }
            function insertAsistenciaEncargados($Estado, $Fecha, $HoraEntrada, $HoraSalida, $Horas, $IdDocente){
                $pst  = $this->mysql->prepare("INSERT INTO asistencia_encargado VALUES(null, :Estado, :Fecha, :HoraEntrada, :HoraSalida, :Horas, :id)");
                $pst->bindParam(":Estado", $Estado, PDO::PARAM_STR);
                $pst->bindParam(":Fecha", $Fecha, PDO::PARAM_STR);
                $pst->bindParam(":HoraEntrada", $HoraEntrada, PDO::PARAM_STR);
                $pst->bindParam(":HoraSalida", $HoraSalida, PDO::PARAM_STR);
                $pst->bindParam(":Horas", $Horas, PDO::PARAM_STR);
                $pst->bindParam(":id", $IdDocente, PDO::PARAM_INT);
                $r = $pst->execute();
                if($r == 1){
                    return true;
                }else{
                    return false;
                }
            }
        //----------------------------------------------------------------
            
        //------------------------------
        //METHODS EXISTENCE
        public function existAsistencia($id, $fecha){
            $pst = $this->mysql->prepare("SELECT asistencia_alumno.Estado, asistencia_alumno.Fecha, asistencia_alumno.Hora_Entrada, asistencia_alumno.Hora_Salida, asistencia_alumno.Horas, asistencia_alumno.alumno_id from asistencia_alumno inner join alumno on alumno.id = asistencia_alumno.alumno_id where alumno_id = :id and asistencia_alumno.Fecha = :Fecha");
            $pst->bindParam(":Fecha", $fecha, PDO::PARAM_STR);
            $pst->bindParam(":id", $id, PDO::PARAM_INT);
            $pst->execute();
            if($pst->rowCount()>0){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }
        public function existAsistenciaEncargado($id, $fecha){
            $pst = $this->mysql->prepare("SELECT asistencia_encargado.Estado, asistencia_encargado.Fecha, asistencia_encargado.Hora_Entrada, asistencia_encargado.Hora_Salida, asistencia_encargado.Horas, asistencia_encargado.encargado_id from asistencia_encargado inner join docente on docente.id_docente = asistencia_encargado.encargado_id where encargado_id = :id and asistencia_encargado.Fecha = :Fecha");
            $pst->bindParam(":id", $id, PDO::PARAM_INT);
            $pst->bindParam(":Fecha", $fecha, PDO::PARAM_STR);
            $pst->execute();
            if($pst->rowCount()>0){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }
        //----------------------------------------------------------------
       
        //new methods
        
        
    }