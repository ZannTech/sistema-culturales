<?php 
include_once('../sql.connection/connection.php');
class ModelCounter extends db{
    function __construct(){
        parent::__construct();
    }
    function getPreregistries(){
        $pst = $this->mysql->prepare("SELECT *FROM pre_registro");
        $pst->execute();
        return $pst->rowCount();
    }
    
}