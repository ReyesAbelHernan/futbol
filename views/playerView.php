<?php

 require_once('View.php');
    
    class playerView extends View
    {
        public function __construct()
        {
            parent::__construct();
            $username = parent::getUsername();
            $this->getSmarty()->assign('username', $username);
        }
    
        function showPlayer($player,$team,$logged)
        {
            $this->getSmarty()->assign('player', $player);
            $this->getSmarty()->assign('team', $team);
            $this->getSmarty()->assign('logged', $logged); 
            $this->getSmarty()->display('template/home.tpl');
        }
    
        public function renderNewplayer($team,$logged)
        {
            $this->getSmarty()->assign('team',$team);
            $this->getSmarty()->assign('logged', $logged);
            $this->getSmarty()->display('template/newPlayer.tpl');
        }
    
        public function editPlayer($player,$team,$logged){
            $this->getSmarty()->assign('player', $player);
            $this->getSmarty()->assign('team',$team);
            $this->getSmarty()->assign('logged', $logged);
            $this->getSmarty()->display('template/editPlayer.tpl');
        }
      
        function showFilterPlayer($player,$getTeam,$logged)
        {
            $this->getSmarty()->assign('player', $player);
            $this->getSmarty()->assign('team', $getTeam);
            $this->getSmarty()->assign('logged', $logged);
            $this->getSmarty()->display('template/home.tpl');
        }

        function renderComments($player,$team,$logged)
        {
            $this->getSmarty()->assign('player', $player);
            $this->getSmarty()->assign('team',$team);
            $this->getSmarty()->assign('logged', $logged);  
            $this->getSmarty()->display("template/commentsPlayer.tpl");

        }

    }