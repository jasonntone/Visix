<?php
require_once __DIR__.'/../Core/Controller.php';

class visits extends Controller{

    public function index(){
        parent::__construct();
        $this->view->render('visits');
    }

    public function createvisit(){
        $this->view->render('CreateVisit');
    }
}