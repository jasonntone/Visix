<?php
session_start();
require_once ".././Models/Visit.php";

if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['numero_visite'])){
    $name = htmlspecialchars($_POST['name']);
    $numero_visite = htmlspecialchars($_POST['numero_visite']);
    $params = array($name,$numero_visite);

    echo "m1";
    print_r($params);
    //$inserting = new Visit();
    //$inserting->AddVisit();
    die();
    require_once ".././Models/CreateVisit.php";

}