<?php

require_once './Models/Users.php';

class registration extends Controller{

    public $username;
    public $firstname;
    public $lastname;
    public $status;
    public $password;
    public $confirm_password;

    public $model;
    public $users;


    public function index(){
        parent::__construct();

        $this->view->render('registration',false);
    }
    public function signup(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){



           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'picture' => 'default.png',
                'username' => strtolower(trim($_POST['username'])),
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'sex' => trim($_POST['sex']),
                'status' => trim($_POST['status']),
                'password' => htmlspecialchars($_POST['password']),
                'confirm_password' => htmlspecialchars($_POST['password']),
                'name_err' => '',
                'firstname_err' => '',
                'lastname_err' => '',
                'password_err' => '',
                'confirm_password_err' => '' 
            ];

            /*echo '<pre>';
            print_r($data);
            echo '</pre>';
            die();*/

           // valide username
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter username';
            }


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
            if(empty($data['username_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
                $users = new Users();
                if($users->create($data)){
                    header('Location:../login');
                }
            }else{
                $this->view->render('registration', $data);
            }
        }else{
            //init data
            $data = [
                'username' => '',
                'firstname' => '',
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