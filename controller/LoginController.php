<?php

include_once './views/LoginView.php';
include_once './model/LoginModel.php';

class LoginController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    private function CheckLoggedInn(){
        
        if(!isset($_SESSION["admin"])){
            $logged = "false";
        } elseif ($_SESSION["admin"] == 1){
            $logged = "admin";
        } else {
            $logged = "user";
        }
        return $logged;
    }


    public function verifyUser()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userChecking = $this->model->getUserByUsername($username);
            if (!empty($userChecking)) {
                AuthHelper::login($userChecking);
                header("Location:" . BASE_URL . '/home');
            } else {
                $this->view->renderLogin("Password or User fail");
                die();
            }
        }
        $this->view->renderLogin("Login fail");
    }

    function showLogin()
    {
        $this->view->renderLogin();
    }


    function logout()
    {
        AuthHelper::logout();
        header("Location:" . BASE_URL . '/home');
    }

    function renderRegister()
    {
        $this->view->renderRegister();
    }

    function registrarUsuario()
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $pass2 = $_POST['password2'];
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->view->renderRegister("Please enter an email correctly");
            die();
        }
        if (!($pass === $pass2)) {
            $this->view->renderRegister("The passwords entered are not the same");
            die();
        }
        if ($this->model->isMailInUse($email)) {
            $this->view->renderRegister("Mail in use");
            die();
        }
        $this->model->addNewUser($user, $pass, $email);
    

        if (!empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['email']))) {
            
            $userDb = $this->model->getUserByUsername($user);
            if (!empty($userDb)) {
                AuthHelper::login($userDb);
                header('Location: ' . BASE_URL . "/home");
            } else
                $this->view->showLogin("Login incorrect, password o user incorrect");

        } else {
            $this->view->showLogin("Login incomplete");
        }

    }

    public function listUsers()
    {
        $users = $this->model->getUsers();
        $logged = $this->CheckLoggedInn();
        $this->view->showlistUsers($users,$logged);
    }

    function deleteUser($id)
    {
        AuthHelper::checkLoggedIn();
        $this->model->deleteUser($id);
        $this->view->renderListUsers();
    }

    function setUserToAdmin($id)
    {


        AuthHelper::checkLoggedIn();
    
        $this->model->updateToAdmin($id);

        $this->view->renderListUsers();
    }

    function setAdminToUser($id)
    {


        AuthHelper::checkLoggedIn();

        $this->model->updateToUser($id);

        $this->view->renderListUsers();
    }


}
