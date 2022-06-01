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
}
