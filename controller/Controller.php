<?php

include_once 'model/Model.php';
include_once 'views/TeamView.php';
include_once 'views/playerView.php';

class Controller
{
        private $model;
        private $teamView;
        private $playerView;

        public function __construct()
        {
            $this->model = new Model();
            $this->teamView = new TeamView();
            $this->playerView = new playerView();
        }

        public function showPlayer()
        {
            $player = $this->model->getAllPlayer(); 
            $team = $this->model->getTeam();
            $this->playerView->showPlayer($player,$team);
        }


        public function showTeam() 
        {
            $team = $this->model->getTeam();
            $this->teamView->showAllTeam($team);
        }

        public function newPlayer() 
        {
            AuthHelper::checkLoggedIn();
            $name = $_POST['name'];
            $subname = $_POST['subname'];
            $number = $_POST['number'];
            $id_team = $_POST['id_team'];
            $nationality = $_POST['nationality'];
            if(isset($_FILES['photo']) ){

                $nameArchivo= $_FILES['photo']['name'];
    
                $temporario=$_FILES['photo']['tmp_name'];
                
                
                $extensionArchivo = pathinfo($nameArchivo, PATHINFO_EXTENSION);   

                $this->model->newPlayerWhitImg($name,$subname,$number,$id_team,$nationality,$nameArchivo,$extensionArchivo,$temporario);
    
            }
            
            $this->model->newPlayer($name,$subname,$number,$id_team,$nationality);
       
            header("Location:" . BASE_URL . 'home');
        }


        public function newTeam() 
        {
            AuthHelper::checkLoggedIn();
            $name = $_POST['name'];
            $this->model->newTeam($name);
            header("Location:" . BASE_URL . 'home');
        }




        public function deletePlayer($id)  
        {
            AuthHelper::checkLoggedIn();
            $this->model->deletePlayer($id);
            header("Location:" . BASE_URL . 'home');
        }

        public function deleteTeam($id) 
        {
            AuthHelper::checkLoggedIn();
            $this->model->deleteTeam($id);
            header("Location:" . BASE_URL . 'home');
        }




        
        public function filtrar()
        {
            $id_team = $_POST['inputFiltrar'];
            $player = $this->model->getPlayerByTeam($id_team);
            $getTeam = $this->model->getTeam();
            $this->playerView->showFilterPlayer($player,$getTeam);
        }


        function renderNewPlayer()
        {
            $team = $this->model->getTeam();
            $this->playerView->rendernewPlayer($team);
        }

        function renderNewTeam()
        {
            $team = $this->model->getTeam();
            $this->teamView->renderNewTeam($team);
            
        }

        
        function updatePlayer($id)
        {
            $player=$this->model->getPlayer($id);
            $team=$this->model-> getTeam();
            $this->playerView->editPlayer($player,$team);
        }
        

        function upPlayer($id){
            $name = $_POST['name'];
            $subname = $_POST['subname'];
            $number = $_POST['number'];
            $nationality = $_POST['nationality'];
            $id_team = $_POST['id_team'];
            $this->model->updatePlayer($id,$name,$subname,$number,$nationality,$id_team);
        }

        function updateTeam($id)
        {
            $team = $this->model->getTeamId($id);
            $this->teamView->editTeam($team);
        }

        function upteam($id){
            $team = $_POST['team'];
            $this->model->updateTeam($id,$team);
        }

        function getCommentsPlayers($id)
    {

        $player = $this->model->getPlayer($id);
        $team = $this->model->getTeam();
        $this->playerView->renderComments($player, $team);
    }


}

