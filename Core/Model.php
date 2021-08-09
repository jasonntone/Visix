<?php

 class Model {

    public $table;
    private $bdd;
    private $db_instance;

    public function __construct()
    {
        $this->bdd = $this->getInstance();
    }

     public function getInstance()
    {
        if (empty($this->db_instance)){
            $host  = "localhost";
            $dbname  = "visix";
            $login = "root";
            $mdp   = "";
            // Création de la connexion
            $this->db_instance = new PDO('mysql:host='.$host.';dbname='.$dbname, $login,
                $mdp,array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
        }
        return $this->db_instance;
    }

     public function getAll() {

         $resultat = $this->bdd->query("SELECT * FROM" .$this->table);

     }
     public function findbydate($data) {

         $resultat = $this->bdd->prepare("SELECT * FROM" .$this->table."WHERE date = ?");
         $resultat->execute($data);
     }
     public function findbyname($data) {

         $resultat = $this->bdd->prepare("SELECT * FROM" .$this->table."WHERE name = ?");
         $resultat->execute($data);
     }
     public function create($data,$fields){

         $resultat = $this->bdd->prepare("INSERT INTO".$this->table.($fields)."VALUES".($data));
         $resultat->execute($data);

     }
     public function update($data, $fields, $indicator, $limiter, $counter){

         $resultat = $this->bdd->prepare("UPDATE".$this->table."SET".$indicator.'='.$data."WHERE".$limiter."=".$counter);
         $resultat->execute($data, $counter);
         
     }
     public function drop($indicator, $data){

         $sql = 'DELETE FROM'.$this->table.'WHERE'.$indicator.'='.$data;
         $resultat = $this->bdd->prepare("DELETE FROM".$this->table."WHERE".$indicator."=".$data);

     }
}