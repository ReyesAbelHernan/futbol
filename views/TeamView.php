<?php

require_once('View.php');


class TeamView extends View
{
    public function __construct()
    {
        parent::__construct();
        $username = parent::getUsername();
        $this->getSmarty()->assign('username', $username);
    }

    function showAllTeam($team)
    {
        $this->getSmarty()->assign('team', $team);
        $this->getSmarty()->display('template/home.tpl');
    }

    public function renderNewTeam($team)
    {
        $this->getSmarty()->assign('team',$team);
        $this->getSmarty()->display('template/newTeam.tpl');
    }

    public function EditTeam($team){
        $this->getSmarty()->assign('team', $team);
        $this->getSmarty()->display('template/editTeam.tpl');
    }
}
