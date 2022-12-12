<?php 
require_once("../sql.connection/connection.php");

class model_evidencias extends db{
    function __construct(){
        parent::__construct();
    }
    function insertEvidence($fecha, $cuerpo, $nota, $id_encargado, $nombre, $status){
        try{
        $pst = $this->mysql->prepare("INSERT INTO evidencias VALUES(null, :fecha, :cuerpo, :nota, :id, :nombre, :status)");
        $pst->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $pst->bindParam(":cuerpo", $cuerpo, PDO::PARAM_STR);
        $pst->bindParam(":nota", $nota, PDO::PARAM_STR);
        $pst->bindParam(":id", $id_encargado, PDO::PARAM_INT);
        $pst->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $pst->bindParam(":status", $status, PDO::PARAM_STR);
        return $pst->execute();
        }catch(PDOException $e){
          echo "Error: " . $e->getMessage;   
        }   
    }
    function fetch_evidencia(){
        $pst = $this->mysql->prepare("SELECT *FROM evidencias");
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $result){
                $data[] = array(
                    "id" => $result->id_evidencias,
                    "fecha" => $result->fecha,
                    "cuerpo" => $result->cuerpo_evidencia,
                    "nota" => $result->nota,
                    "id_encargado" => $result->id_encargado,
                    "publicador" => $result->nombre_encargado,
                    "status"=>$result->status
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function get_evidencia_by_id($id){
        $pst = $this->mysql->prepare("SELECT *FROM evidencias where id_encargado = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $result){
                $data[] = array(
                    "id" => $result->id_evidencias,
                    "fecha" => $result->fecha,
                    "cuerpo" => $result->cuerpo_evidencia,
                    "nota" => $result->nota,
                    "id_encargado" => $result->id_encargado,
                    "publicador" => $result->nombre_encargado,
                    "status"=>$result->status
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
    }
    function fetch_ev_uid($id){
      try{
        $pst = $this->mysql->prepare("SELECT *FROM evidencias where id_evidencias = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if($pst->rowCount()>0){
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $result){
                $data[] = array(
                    "id" => $result->id_evidencias,
                    "fecha" => $result->fecha,
                    "cuerpo" => $result->cuerpo_evidencia,
                    "nota" => $result->nota,
                    "id_encargado" => $result->id_encargado,
                    "publicador" => $result->nombre_encargado,
                    "status"=>$result->status
                );
            }
            return json_encode($data);
        }else{
            return "0";
        }
      }catch(PDOException $e){
          echo "Error ".$e->getMessage();
      }
    }
    function set_status($id, $status, $note){
      try{
        $pst = $this->mysql->prepare("UPDATE evidencias SET status = :s, nota = :note WHERE id_evidencias = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->bindParam(":s", $status, PDO::PARAM_STR);
        $pst->bindParam(":note", $note, PDO::PARAM_STR);
        return $pst->execute();
      }catch(PDOException $e){
        return "Error ".$e->getMessage();
      }

    }
}