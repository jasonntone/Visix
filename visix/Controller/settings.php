<?php

require_once './Models/VisitModel.php';

class settings extends Controller{

    public function index(){
        parent::__construct();

        $VisitModel = new VisitModel();

        $results = $VisitModel->showvisit();
        $this->view->render('settings', $results);
        
    }
}