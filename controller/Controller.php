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


        //** funcion que se encarga de darle un valor a una variable que se usara en los templates */

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

        //** funcion que se encarga de recuperar informacion y mandarla a la vista */ 

        public function showPlayer()
        {
            $player = $this->model->getAllPlayer(); 
            $team = $this->model->getTeam();
            $logged = $this->CheckLoggedInn();
            $this->playerView->showPlayer($player,$team,$logged);
        }


        public function showTeam() 
        {
            $team = $this->model->getTeam();
            $this->teamView->showAllTeam($team);
        }

        function renderNewPlayer()
        {
            $team = $this->model->getTeam();
            $logged = $this->CheckLoggedInn();
            $this->playerView->rendernewPlayer($team,$logged);
        }

        function renderNewTeam()
        {
            $team = $this->model->getTeam();
            $this->teamView->renderNewTeam($team);
            
        }


        function getCommentsPlayers($id)
        {
        $player = $this->model->getPlayer($id);
        $team = $this->model->getTeam();
        $logged = $this->CheckLoggedInn();
        $this->playerView->renderComments($player,$team,$logged);
        }

        function updateTeam($id)
        {
            $team = $this->model->getTeamId($id);
            $this->teamView->editTeam($team);
        }


        //** funciones para crear un nuevo jugador y equipo con sus respectivas validaciones */

        public function newPlayer() 
        {
            AuthHelper::checkLoggedIn();
            $name = $_POST['name'];
            $subname = $_POST['subname'];
            $number = $_POST['number'];
            $id_team = $_POST['id_team'];
            $nationality = $_POST['nationality'];
            if((isset($_FILES['photo']) && ($_FILES['photo']['size'] > 1))) {

                $nameArchivo= $_FILES['photo']['name'];
    
                $temporario=$_FILES['photo']['tmp_name'];
                
                $extensionArchivo = pathinfo($nameArchivo, PATHINFO_EXTENSION); 

                if (!empty($_POST['name']) && !empty($_POST['subname']) && !empty($_POST['number']) && !empty($_POST['id_team']) && !empty($_POST['nationality'])) {
                    $this->model->newPlayerWhitImg($name,$subname,$number,$id_team,$nationality,$nameArchivo,$extensionArchivo,$temporario);
                }
            } else
            if (!empty($_POST['name']) && !empty($_POST['subname']) && !empty($_POST['number']) && !empty($_POST['id_team']) && !empty($_POST['nationality'])) {
                $this->model->newPlayer($name,$subname,$number,$id_team,$nationality);
            }
            header("Location:" . BASE_URL . '/home');
        }


        public function newTeam() 
        {
            AuthHelper::checkLoggedIn();
            $name = $_POST['name'];
            if (!empty($_POST['name'])) {    
            $this->model->newTeam($name);
            }
            header("Location:" . BASE_URL . '/home');
        }


        //** funciones que se encargar a partir de un id realizar una accion de borrado en la BD */


        public function deletePlayer($id)  
        {
            AuthHelper::checkLoggedIn();
            $this->model->deletePlayer($id);
            header("Location:" . BASE_URL . '/home');
        }

        public function deleteTeam($id) 
        {
            AuthHelper::checkLoggedIn();
            $this->model->deleteTeam($id);
            header("Location:" . BASE_URL . '/home');
        }

        public function deleteImage($id) 
        {
            AuthHelper::checkLoggedIn();
            $this->model->deleteImage($id);
            header("Location:" . BASE_URL . '/home');
        }


        //** funcion que se encarga de buscar los filas relacionadas a un id para listarlas */
        
        public function filtrar()
        {
            $id_team = $_POST['inputFiltrar'];
            if (!empty($_POST['inputFiltrar'])) {  
                $player = $this->model->getPlayerByTeam($id_team);
            }
            $getTeam = $this->model->getTeam();
            $logged = $this->CheckLoggedInn();
            $this->playerView->showFilterPlayer($player,$getTeam,$logged);
        }


       
        //** funciones que se encargan de actualizar informacion en la base de datos con sus validaciones  */
        
        function updatePlayer($id)
        {
            $player=$this->model->getPlayer($id);
            $team=$this->model-> getTeam();
            $logged = $this->CheckLoggedInn();
            $this->playerView->editPlayer($player,$team,$logged);
        }
        

        function upPlayer($id){
            $name = $_POST['name'];
            $subname = $_POST['subname'];
            $number = $_POST['number'];
            $id_team = $_POST['id_team'];
            $nationality = $_POST['nationality'];
            if((isset($_FILES['photo']) && ($_FILES['photo']['size'] > 1))) {
                
                $nameArchivo= $_FILES['photo']['name'];
    
                $temporario=$_FILES['photo']['tmp_name'];
                
                $extensionArchivo = pathinfo($nameArchivo, PATHINFO_EXTENSION);   

                if (!empty($_POST['name']) && !empty($_POST['subname']) && !empty($_POST['number']) && !empty($_POST['id_team']) && !empty($_POST['nationality'])) {
                    $this->model->updatePlayerWhitImg($id,$name,$subname,$number,$id_team,$nationality,$nameArchivo,$extensionArchivo,$temporario);
                }
            } else
            if (!empty($_POST['name']) && !empty($_POST['subname']) && !empty($_POST['number']) && !empty($_POST['id_team']) && !empty($_POST['nationality'])) {
                $this->model->updatePlayer($id,$name,$subname,$number,$id_team,$nationality);
            }
        }


        function upteam($id)
        {
            $team = $_POST['team'];
            if (!empty($_POST['team'])) {
                $this->model->updateTeam($id,$team);
            }
        }

   

}

