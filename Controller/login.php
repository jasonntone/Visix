<?php

require_once __DIR__.'/../Core/Controller.php';

class login extends Controller{

    public function index(){
        parent::__construct();
        $this->view->render('login');
    }

    public function registration(){
        $this->view->render('registration');
    }
}