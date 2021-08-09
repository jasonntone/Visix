<?php
class CreateVisit extends Controller{

    public function index(){
        parent::__construct();

        $this->view->render('CreateVisit');
    }
}