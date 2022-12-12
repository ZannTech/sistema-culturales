<?php
include_once('../sql.connection/connection.php');
class modelNoticesClass extends db
{
    function __construct()
    {
        parent::__construct();
    }
    public function getNotices()
    {
        $pst = $this->mysql->prepare("SELECT *FROM noticias ORDER BY DATE DESC");
        $pst->execute();
        $results = $pst->fetchAll(PDO::FETCH_OBJ);
        if ($pst->rowCount() > 0) {
            foreach ($results as $result) {
                $notices[] = array(
                    'ID_NOTICIA' => $result->ID,
                    'SECCION' => $result->SECTION,
                    'TITULO' => $result->TITLE,
                    'DESCRIPCION' => $result->DESCRIPTION,
                    'FECHA' => $result->DATE,
                    'PUBLICADOR' => $result->PUBLISHER
                );
            }
            return json_encode($notices);
        } else {
            return "0";
        }
    }
    public function publish_post($SECTION, $TITLE, $DESCRIPTION,  $DATE, $PUBLISHER,  $IP)
    {
        $pst  = $this->mysql->prepare("INSERT INTO noticias values(null, :SECTION,  :TITLE, :DESCRIPTION, :DATE, :PUBLISHER, :IP)");
        $pst->bindParam(':SECTION', $SECTION, PDO::PARAM_STR);
        $pst->bindParam(':TITLE', $TITLE, PDO::PARAM_STR);
        $pst->bindParam(':DESCRIPTION', $DESCRIPTION, PDO::PARAM_STR);
        $pst->bindParam(':DATE', $DATE, PDO::PARAM_STR);
        $pst->bindParam(':PUBLISHER', $PUBLISHER, PDO::PARAM_STR);
        $pst->bindParam(':IP', $IP, PDO::PARAM_STR);
        return $pst->execute();
    }
    function deleteposts($id)
    {
        try {
            $pst = $this->mysql->prepare("DELETE FROM noticias where ID = :ID");
            $pst->bindParam(":ID", $id, PDO::PARAM_INT);
            return $pst->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function editposts($id, $section, $titulo, $description)
    {
        try {
            $pst = $this->mysql->prepare("UPDATE noticias SET SECTION = :SECTION, TITLE = :TITLE, DESCRIPTION = :DESCRIPTION WHERE ID = :ID");
            $pst->bindParam(":ID", $id, PDO::PARAM_INT);
            $pst->bindParam(":SECTION", $section, PDO::PARAM_STR);
            $pst->bindParam(':TITLE', $titulo, PDO::PARAM_STR);
            $pst->bindParam(':DESCRIPTION', $description, PDO::PARAM_STR);
            return $pst->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetchreq()
    {
        $pst = $this->mysql->prepare("SELECT *FROM noticias ORDER BY DATE DESC");
        $pst->execute();
        if ($pst->rowCount() > 0) {
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $result) {
                $data[] = array(
                    'ID_NOTICIA' => $result->ID,
                    'SECCION' => $result->SECTION,
                    'TITULO' => $result->TITLE,
                    'DESCRIPCION' => $result->DESCRIPTION,
                    'FECHA' => $result->DATE,
                    'PUBLICADOR' => $result->PUBLISHER
                );
            }
            return json_encode($data);
        } else {
            return "0";
        }
    }
    public function fetchbyid($id)
    {
        $pst = $this->mysql->prepare("SELECT *FROM noticias WHERE ID = :id");
        $pst->bindParam(":id", $id, PDO::PARAM_INT);
        $pst->execute();
        if ($pst->rowCount() > 0) {
            $results = $pst->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $result) {
                $data[] = array(
                    'ID_NOTICIA' => $result->ID,
                    'SECCION' => $result->SECTION,
                    'TITULO' => $result->TITLE,
                    'DESCRIPCION' => $result->DESCRIPTION,
                    'FECHA' => $result->DATE,
                    'PUBLICADOR' => $result->PUBLISHER
                );
            }
            return json_encode($data);
        } else {
            return "0";
        }
    }
}
