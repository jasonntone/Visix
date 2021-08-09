<?php

require_once __DIR__."/../Core/Model.php";


class Visit extends Model{

    public $table = 'visits';
    public $fields = array("name","numero_visite");
    public $params = array("name"=>'name',"numero_visite"=>'numero_visite');


    public function createVisit($table,$fields,$params){

        return $this->create($this->table,$this->fields,$this->params);
    }
    public function updateVisit($table,$fields,$params){

        $this->update($this->table,$this->fields,$this->params);



    }



}