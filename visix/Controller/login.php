<?php

require_once __DIR__.'\..\Models\Users.php';

class login extends Controller{

    public $username;
    public $firstname;
    public $lastname;
    public $picture;
    public $status;
    public $password;
    public $confirm_password;

    public $model;
    public $users;
    public $data;

    public function index(){
        parent::__construct();
        $this->view->render('login',false);
    }

    public function registration(){
        $this->view->render('registration');
    }


    public function run(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 8 AND strlen($data['password']) > 8 ){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            $users = new Users();
            if ($users->connect($data)) {
                $this->view->render('settings', $_SESSION['id']);
            } else {
                $data['password_err'] = 'Password incorrect';
                
            }
        }
    }
}