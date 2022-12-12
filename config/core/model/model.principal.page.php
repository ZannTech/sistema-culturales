<?php
include_once('../sql.connection/connection.php');
    class modelPrincipalPage extends db{
        function __construct(){
            parent::__construct();
        }
        public function sendCommentary($Nombre, $Telefono, $Email, $Mensaje, $ip, $date){
            $pst = $this->mysql->prepare("INSERT INTO sugerencias values(null, :nombre, :telefono, :email, :mensaje, :ip, :date)");
            $pst->bindParam(':nombre', $Nombre, PDO::PARAM_STR);
            $pst->bindParam(':telefono', $Telefono, PDO::PARAM_STR);
            $pst->bindParam(':email', $Email, PDO::PARAM_STR);
            $pst->bindParam(':mensaje', $Mensaje, PDO::PARAM_STR);
            $pst->bindParam(':ip', $ip, PDO::PARAM_STR);
            $pst->bindParam(':date', $date, PDO::PARAM_STR);
            return $pst->execute();
        }
      
    }