<?php
require_once __DIR__.'/../Core/Controller.php';
require_once './Models/VisitModel.php';

class visits extends Controller{

    public function index(){
        parent::__construct();
        
        $VisitModel = new VisitModel();
        $this->view->render('visits',false);
    }

    public function create(){
    


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){



            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'NomVisiteur' => strtolower(trim($_POST['NomVisiteur'])),
                'PrenomVisiteur' => trim($_POST['PrenomVisiteur']),
                'NumeroCni' => trim($_POST['NumeroCni']),
                'NumeroTelephone' => trim($_POST['NumeroTelephone']),
                'statut' => 'pending',
            ];

            //make sure error are empty
            if(empty($data['NomVisiteur_err']) && empty($data['PrenomVisiteur_err']) && empty($data['lastname_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
                $visits = new VisitModel();
                if($visits->create($data)){
                    header('Location:../settings');
                }
            }else{
                echo "sorry";
            }
        }else{
            //init data
            $data = [
                'NomVisiteur' => '',
                'PrenomVisiteur' => '',
                'NumeroCni' => '',
                'NumeroTelephone' => '',
                'status' => '',
            ];
        }
    }
    public function update(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    
    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'NumeroVisite' => trim($_POST['NumeroVisite']),
                'finvisite' => date("H:m:s"),
            ];
    
                //make sure error are empty
            if(empty($data['NumeroVisite_err'])){
                $visits = new VisitModel();
                if($visits->update($data)){
                    header('Location:../settings');
                }
                }else{
                    echo "sorry";
                }
        }else{
            //init data
            $data = [
                'NumeroVisite' => '',
            ];
        }
    }
    public function findbystatut(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    
    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'statut' => trim($_POST['statut']),
            ];
    
                //make sure error are empty
            if(empty($data['statut_err'])){
                $visits = new VisitModel();
                if($visits->findbystatut($data)){
                    header('Location:../settings');
                }
                }else{
                    echo "sorry";
                }
        }else{
            //init data
            $data = [
                'statut' => '',
            ];
        }
    }
    public function export(){

        $filename = 'rapport_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
        $visits = new VisitModel();
        $usersData = $visits->showvisit();
        $file = fopen('php://output','w');
        $header = array("firstname","lastname","CNI","Tel","Visit_Date","Start_at","End_at","VisitID","Statut","registred_by","Save_at"); 
        fputcsv($file, $header);
        foreach ($usersData as $line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
}
}