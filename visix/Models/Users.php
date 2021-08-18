<?php

require_once "./Core/Model.php";

class Users extends Model{

    public function __construct()
    {
        parent::__construct();
    }
 
    //register new user
    public function create($data){

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = '1234567891011121';
        $encryption_key = "visix";
        $options = 0;
        $encryption = openssl_encrypt($data['password'], $ciphering, $encryption_key, $options, $encryption_iv);
        $password = $encryption;

        $check = $this->bdd->prepare('SELECT username FROM users WHERE username = :username');
        $check->execute(array('username' => $data['username']));
        $info = $check->fetch();

        if($info != $data['username']){
           if($data['username'] == "beganz"){
               $status = "root";
           }else{
               $status = $data['status'];
           }
            $req = $this->bdd->prepare('INSERT INTO users (picture, username, firstname, lastname, sex, status, password) VALUES (:picture, :username, :firstname, :lastname, :sex, :status, :password)');

            if($req->execute(array('picture' => $data['picture'], 'username' => $data['username'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'sex' => $data['sex'], 'status' => $status, 'password' => $password))){
                return true;
            }else{
                return false;
            }
        }else{
            echo "user Already exist";
        }
    }
 
    public function connect($data){

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = '1234567891011121';
        $encryption_key = "visix";
        $options = 0;
        $encryption = openssl_encrypt($data['password'], $ciphering, $encryption_key, $options, $encryption_iv);


        $recupUser = $this->bdd->prepare('SELECT * FROM users WHERE username = :username');
        $recupUser->execute(array('username' => $data['username']));
        $arr = $recupUser->fetch();
        
        $hash_password = $arr['password'];
       
        if(count($arr) > 0){

            
            if($encryption == $hash_password) {
                $current_time = date('H');
                $_SESSION['id'] = $arr['id'];
                $_SESSION['username'] = $arr['username'];
                $_SESSION['lastname'] = $arr['lastname'];
                $_SESSION['firstname'] = $arr['firstname'];
                $_SESSION['sex'] = $arr['sex'];
                $_SESSION['status'] = $arr['status'];
                if($current_time < 12){
                    $_SESSION['greets'] = "Good Morning";
                }elseif($current_time >= 12 AND $current_time < 18){
                    $_SESSION['greets'] = "Good Afternoon";
                }elseif($current_time >= 18){
                    $_SESSION['greets'] = "Good Evening";
                }
                header('Location:../settings');
            }else{
                echo "Invalid Data";
            }
        }else{
            echo "User not found";
        }
    }
 
    public function getUserBylastname($data){
      $req = $this->bdd->prepare('SELECT * FROM user WHERE lastname = :lastname');
      $req = $this->bdd-execute(array('lastname' => $data['lastname']));
 
        $row = $this->bdd->single();
 
        return $row;
    }
}