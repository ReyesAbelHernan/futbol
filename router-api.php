<?php
require_once 'Router.php';
require_once 'api/ApiController.php';
require_once 'api/ApiComentariosController.php';

// crea el router
$router = new Router();


// Comentarios 

$router->addRoute('comentarios', "POST", 'ApiComentariosController', 'InsertComentario');
$router->addRoute("comentarios/:ID", "GET", "ApiComentariosController", "GetComentarios");
$router->addRoute("comentarios/:ID", "DELETE", "ApiComentariosController", "deleteComentario");



//Admin/User

$router->addRoute("admin/:ID", "POST", "LoginController", "SetUserToAdmin");
$router->addRoute("registrado/:ID", "POST", "LoginController", "SetAdminToUser");
$router->addRoute("deleteUser/:ID", "POST", "LoginController", "deleteUser");



// rutea

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
