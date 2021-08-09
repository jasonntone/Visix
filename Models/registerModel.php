<?php

class registerModel extends Model
{

    public function __construct()
    {
       parent::__construct();
    }
    public function checkuser($username,$firstname,$lastname,$password)
    {
       $result= $this->db->select("SELECT * FROM 'Users' WHERE username = '".$username."' OR firstname = '".$firstname."'");
       $count = count($result);
       return $count;
    }
    public function create_user($data)
    {
       $this->db->create('Users', $data);
    }

}