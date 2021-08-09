<?php
class index extends Controller{

    public function index(){
        parent::__construct();

        $this->view->render('index');
    }
}