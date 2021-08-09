<?php

class View{
    private $repository = 'Views/';

    public function render($name){
        require $this->repository.$name.'.php';
    }
}