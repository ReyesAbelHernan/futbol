<?php

require_once('View.php');

class LoginView extends View
{

    public function __construct()
    {
        parent::__construct();
        $username = parent::getUsername();
        $this->getSmarty()->assign('username', $username);
    }

    public function renderLogin($mensaje = null)
    {
        $this->getSmarty()->assign('mensaje', $mensaje);
        $this->getSmarty()->display('template/login.tpl');
    }

    public function renderRegister($mensaje = null)
    {
        $this->getSmarty()->assign('mensaje', $mensaje);
        $this->getSmarty()->display('template/register.tpl');
    }

    public function showListUsers($users,$logged){
        $this->getSmarty()->assign('Usuarios', "Tabla Usuarios");
        $this->getSmarty()->assign('users', $users); 
        $this->getSmarty()->assign('logged', $logged); 
        $this->getSmarty()->display('template/listUsers.tpl');
    }

    public function renderListUsers(){

        header("Location: " . BASE_URL . 'listUsers');
    }

    public function showLogin($logged,$error=null) {
        $this->getSmarty()->assign('mensaje', $error);  
        $this->getSmarty()->assign('logged', $logged);    
        $this->getSmarty()->assign('index', BASE_URL.'login');
        $this->getSmarty()->display('template/login.tpl');
    }


}
