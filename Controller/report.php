<?php
class report extends Controller{

    public function index(){
        parent::__construct();

        $this->view->render('report');
    }
}