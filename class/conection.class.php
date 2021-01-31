<?php

trait Conection {

    private $dbName = "meraki";
    private $dbUser = "root";
    private $host = "127.0.0.1";
    private $pdo;
    private $cepOrigem = 2723050;
    
    function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname={$this->dbName};host={$this->host};", "{$this->dbUser}");
        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    
}