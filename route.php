<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) );

require_once('controller/Controller.php');
require_once('controller/LoginController.php');


if ($_GET['action'] == '')
{
	$_GET['action'] = 'home';
}

$urlParts = explode('/', $_GET['action']);

$Controller = new Controller();
$LoginController = new LoginController();


switch ($urlParts[0]) {
	case 'home':
		$Controller->showPlayer();
		break;
	case 'showTeam':
		$Controller->showTeam();
		break;
	case 'deleteTeam':
		$Controller->deleteTeam($urlParts[1]);
		break;
	case 'deletePlayer':
		$Controller->deletePlayer($urlParts[1]);
		break;
	case 'deleteImage':
		$Controller->deleteImage($urlParts[1]);
		break;
	case 'newTeam':
		$Controller->newTeam();
		break;
	case 'newPlayer':
		$Controller->newPlayer();
		break;	
	case 'renderNewTeam':
		$Controller->renderNewTeam();
		break;
	case 'renderNewPlayer':
		$Controller->renderNewPlayer();
		break;
	case 'renderNewTeam':
		$Controller->renderNewTeam();
		break;
	case 'register':
		$LoginController->renderRegister();
		break;
	case 'verifyUser':
		$LoginController->verifyUser();
		break;
	case 'registrar':
		$LoginController->registrarUsuario();
		break;
	case 'editPlayer':
		$Controller->updatePlayer($urlParts[1]);
		break;
	case 'editTeam':
		$Controller->updateTeam($urlParts[1]);
		break;
	case 'commentsPlayer':
		$Controller->getCommentsPlayers($urlParts[1]);
		break;
	case 'updatePlayer':
		$Controller->upPlayer($urlParts[1]);
		$Controller->showPlayer();
		break;
	case 'updateTeam':
		$Controller->upTeam($urlParts[1]);
		$Controller->showPlayer();
		$Controller->showTeam();
		break;
	case 'filtrar':
		$Controller->filtrar();
		break;
	case 'logout':
		$LoginController->logout();
		$Controller->showTeam();
		break;
	case 'login':
		$LoginController->showLogin();
		break;
	case 'deleteUser':
		$LoginController->deleteUser($urlParts[1]);
		break;
	case 'admin':
		$LoginController->setUserToAdmin($urlParts[1]);
		break;
	case 'user':
		$LoginController->setAdminToUser($urlParts[1]);
		break;
	case 'listUsers':
		$LoginController->listUsers();
		break;
	default:
		echo '<h1>Error 404 - Page not found </h1>';
		break;
}


 