<?php

class db
{
    public $mysql = null;

    function __construct()
    {
        try {
            
            $this->mysql = $this->getConnection();
            
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    private function getConnection(){
        require_once("global.php");
        $host = SERVER;
        $user = USERNAME;
        $pass = PASSWORD;
        $database = DATABASE;
        $charset = "utf8";
        $opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
		$pdo = new pdo("mysql:host={$host};dbname={$database};charset={$charset}", $user, $pass, $opt);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
    }
}