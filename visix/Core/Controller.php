<?php


class Controller{

    public $model;

    public function model($model){
        // Require model file
        require_once '../Models/' . $model . '.php';

        return new $model();
      }

    public function __construct(){

        $this->model = new Model();

        $this->view = new View();
    }
}