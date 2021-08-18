<?php

require_once "./Core/Model.php";

class VisitModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data){

        $numeroVisite = rand(0, 10000);

        $check = $this->bdd->prepare('SELECT NumeroVisite FROM visites WHERE NumeroVisite = :NumeroVisite');
        $check->execute(array('NumeroVisite' => $numeroVisite));
        $info = $check->fetch();

        if($info != $numeroVisite){

            $req = $this->bdd->prepare('INSERT INTO visites (NomVisiteur, PrenomVisiteur, NumeroCni, NumeroTelephone, NumeroVisite, statut, registred_by) VALUES (:NomVisiteur, :PrenomVisiteur, :NumeroCni, :NumeroTelephone, :NumeroVisite, :statut, :registred_by)');

            if($req->execute(array('NomVisiteur' => $data['NomVisiteur'], 'PrenomVisiteur' => $data['PrenomVisiteur'], 'NumeroCni' => $data['NumeroCni'], 'NumeroTelephone' => $data['NumeroTelephone'], 'NumeroVisite' => $numeroVisite, 'statut' => $data['statut'], 'registred_by' => $_SESSION['username']))){
                return true;
            }else{
                return false;
            }
        }else{
            echo "An Error have occured";
        }
    }
    public function showvisit(){

        $recupVisit = $this->bdd->prepare("SELECT * FROM visites ORDER BY DateVisite DESC");
        $recupVisit->execute();
        $visitresults = $recupVisit->fetchAll();
        return $visitresults;
    }
    public function findbydate($data){
        $dateinit = $data['dateinit'];
        $datefin = $data['datefin'];
        $recupVisit = $this->bdd->prepare("SELECT * FROM visites WHERE DateVisite BETWEEN $dateinit AND $datefin");
        $recupVisit->execute();
        $visitresults = $recupVisit->fetchAll();
        return $visitresults;
    }
    public function findbystatut($data){
        $statut = $data['statut'];
        $recup = $this->bdd->prepare("SELECT * FROM visites WHERE statut = :statut");
        $recup->execute(array('statut' => $statut));
        $array = $recup->fetchAll();
        
        return $array;
    }
    public function update($data){
        
        $statut = "ended";
        $FinVisite = date("H:i:s", strtotime('-1 hour'));
        $update = $this->bdd->prepare('UPDATE visites SET FinVisite = :FinVisite, statut = :statut WHERE NumeroVisite = :NumeroVisite');
        if($update->execute(array('FinVisite' => $FinVisite, 'statut' => $statut, 'NumeroVisite' => $data['NumeroVisite']))){
            header('Location: ../settings');
        }

        
    }

    //find visit by visit No
 
    public function findbynumber($data){

        $recupUser = $this->bdd->prepare('SELECT * FROM visites WHERE NumeroVisite = :NumeroVisite');
        $recupUser->execute(array('NumeroVisite' => $data['NumeroVisite']));
        $arr = $recupUser->fetch();
        
        
    }
 
    public function getVisitBydate($data){
      $req = $this->bdd->prepare('SELECT * FROM visites WHERE DateVisite = :DateVisite');
      $req = $this->bdd-execute(array('DateVisite' => $data['DateVisite']));
 
        $row = $this->bdd->single();
 
        return $row;
    }
}