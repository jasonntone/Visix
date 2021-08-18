<?php
class dashboard extends Controller{

    public function index(){
        parent::__construct();

        $this->view->render('dashboard');
    }
    public function settings(){

        $this->view->render('settings');
    }
}