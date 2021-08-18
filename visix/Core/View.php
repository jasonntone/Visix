<?php

class View{
    private $repository = 'Views/';

    public function render($name,$param){
        $result = $param;
        require $this->repository.$name.'.php';
    }
}