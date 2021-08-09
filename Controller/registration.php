<?php

require_once './Core/Model.php';

class registration extends Controller{
    public $username;
    public $firstname;
    public $lastname;
    public $password;
    public $confirm_password;

    public $model;

    public function index(){
        parent::__construct();

        $model = new Model();

        $this->view->render('registration');
    }
    public function signup(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'name' => trim($_POST['username']),
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'firstname_err' => '',
                'lastname_err' => '',
                'password_err' => '',
                'confirm_password_err' => '' 
            ];

            //valide name
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter name';
            }

            //validate email
            if(empty($data['firstname'])){
                $data['firstname_err'] = 'Please enter firstname';
            }

            //validate password 
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            //validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }else{
                if($data['password'] != $data['confirm_password'])
                {
                    $data['confirm_password_err'] = 'Password does not match';
                }
            }

            //make sure error are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->register($data)){
                    flash('register_success', 'you are registerd you can login now');
                    redirect('./login');
                }
            }else{
                $this->view('register', $data);
            }
        }else{
            //init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '' 
            ];
            //load view
            $this->view('register', $data);          
        }
    }
}