<?php
class settings extends Controller{

    public function index(){
        parent::__construct();

        $this->view->render('settings');
    }
}