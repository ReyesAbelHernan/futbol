<?php

require_once('smarty/libs/Smarty.class.php');
require_once('helpers/AuthHelper.php');

class View
{
    private $smarty;
    private $authhelper;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->authhelper = new AuthHelper();
        $username = $this->authhelper->getLoggedUserName();
        $this->getSmarty()->assign('username', $username);
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

    public function getUsername()
    {
        $username = $this->authhelper->getLoggedUserName();
        return $username;
    }

    public function renderHome($player,$team)
    {
        $this->smarty->display('template/home.tpl');
    }
  
}
